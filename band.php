<?php
    require_once("connection.php");
    session_start();


    $queryNumeroArtisti = "SELECT COUNT(*) FROM artista";
    if($resultQ = mysqli_query($mysqliConnection, $queryNumeroArtisti)){
        $numArtisti = (int)mysqli_fetch_array($resultQ);
    }

    $queryArtisti = "SELECT * FROM artista";
    if ($resultQ2 = mysqli_query($mysqliConnection,$queryArtisti)){
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
                <a href="#" class="navbar-item padding-larger button floatRight">IL TUO PROFILO</a>
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
        for($i=0;$i<=$numArtisti;$i++){ 
            $artista = mysqli_fetch_array($resultQ2);
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
                    <td>
                        <br />
                        <span class="ticket"> BIGLIETTO BASIC 40&euro;</span>
                        <br />
                        <input class="bottone" type="button" value="Acquista ora">
                        <br />
                        <span class="posti">Posti disponibili:250</span>
    
                    </td>
                    <td>
                        <br />
                        <span class="ticket">BIGLIETTO PREMIUM 70&euro;</span>
                        <br />
                        <input class="bottone" type="button" value="Acquista ora">
                        <br />
                        <span class="posti">Posti disponibili:250</span>
                    </td>
                </tr>
            </table>
        </div>
    <?php
        }
    ?>
    
</body>

</html>
