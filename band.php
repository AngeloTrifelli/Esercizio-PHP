<?php
    require_once("connection.php");
    session_start();



    $queryArtisti = "SELECT * FROM artista";
    $resultQ = mysqli_query($mysqliConnection,$queryArtisti);


    $queryIDassociazioni = "SELECT id FROM associato";
    $resultQueryID = mysqli_query($mysqliConnection,$queryIDassociazioni);

    while ($idAssociazione = mysqli_fetch_array($resultQueryID)){
        if (isset($_POST[$idAssociazione[0]])){
            if(isset($_SESSION['emailUtente']) && isset($_SESSION['passwordUtente']) ){
                $_SESSION['associazioneScelta'] = $idAssociazione[0];
                $_SESSION['accessoPermesso'] = True;
                header("Location: confermaPrenotazione.php");
            }
            else{
                header("Location: login.php");
            }
        }
    }
    


    if(isset($_POST['logout'])){
        unset($_SESSION['emailUtente']);
        unset($_SESSION['passwordUtente']);
        header("Location: intro.php");
    }

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Lista artisti</title>
    <style>
    <?php  include "../CSS/band.css"  ?>
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&family=Poppins:ital,wght@1,200&family=Ubuntu:wght@500&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&family=Oxygen:wght@300&family=Poppins:ital,wght@1,200&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <div class="navbar black shadow">

            <?php
                if(isset($_SESSION['emailUtente']) && isset($_SESSION['passwordUtente']) ){
            ?>
                <a href="./intro.php" class="navbar-item padding-larger button">HOME</a>
                <a href="./paginaUtente.php" class="navbar-item padding-larger button floatRight">IL TUO PROFILO</a>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <input type="submit" class="black navbar-item button logoutButton floatRight" name="logout" value="LOGOUT" />
                </form>
            <?php 
                }
                else{
            ?>
                <a href="./intro.php" class="navbar-item padding-large button">HOME</a>
                <a href="./login.php" class="navbar-item padding-large button floatRight">LOGIN</a>
                <a href="./registrazione.php" class="navbar-item padding-large button floatRight">REGISTRATI</a>
            <?php
                }
            ?>
           
        </div>

    
    <?php 
        while($artista = mysqli_fetch_array($resultQ)){ 
    ?>
        <div class="band paragraph">
            <h1><?php echo $artista['nome'];?></h1>
            <p>
                <img class="immagine" src="<?php echo $artista['linkImmagine'];?>" alt="immagine non trovata!" align="middle">

            </p>
            <p class="articolo">
                <?php echo $artista['descrizione']; ?>
            </p>
        </div>
        <div>
            <table class="biglietto" align="center">
                <tr>
                    <td class="data"> 
                        <?php
                            $temp= $artista['dataOraConcerto'];
                            $giorno = mb_substr($temp, 8,2);        //Funzione per estrarre una sottostringa
                            $mese = mb_substr($temp,5,2 );
                            $anno = mb_substr($temp,0,4 );
                            $ora = mb_substr($temp, 11, 8);
            
                            echo $giorno."-".$mese."-".$anno." ".$ora;
                        ?>
                    </td>

                    <?php 
                    $queryBiglietti = "SELECT * FROM associato WHERE id_artista=\"{$artista['nome']}\" ";
                    $resultQ2 = mysqli_query($mysqliConnection,$queryBiglietti);

                   
                    while($biglietto = mysqli_fetch_array($resultQ2)){
                        $queryPrezzo = "SELECT prezzo FROM biglietto WHERE tipo=\"{$biglietto['id_biglietto']}\" ";
                        $resultQ3 = mysqli_query($mysqliConnection,$queryPrezzo);
                        $prezzo = mysqli_fetch_array($resultQ3);

                        $queryNumPrenotazioni = "SELECT COUNT(*) FROM prenota WHERE id_associazione = {$biglietto['id']} ";
                        $resultQ4 = mysqli_query($mysqliConnection,$queryNumPrenotazioni);
                        $numPrenotazioni = mysqli_fetch_array($resultQ4);

                        $postiDisponibili = $biglietto['numPosti'] - $numPrenotazioni[0];

                    ?>

                    <td>
                        <br />
                        <span class="ticket"> BIGLIETTO <?php echo $biglietto['id_biglietto']." ".$prezzo[0];?> &euro;</span>
                        <br />
                        <?php 
                            if($postiDisponibili!=0){       // Mostro il bottone solamente se ho dei posti disponibili
                        ?>
                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                                <input class="bottone" type="submit"  name="<?php echo $biglietto['id'];?>" value="Acquista ora">    
                            </form>   
                        <?php
                            }
                        ?>

                        <br />
                        <span class="posti">Posti disponibili:<?php echo $postiDisponibili;?> </span>
    
                    </td>

                    <?php
                    }
                    ?>
    
                </tr>
            </table>
        </div>
    <?php
        }
    ?>
    
</body>

</html>
