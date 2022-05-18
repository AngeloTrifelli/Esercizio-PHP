<?php
    require_once("connection.php");


    session_start();
    
    if (isset($_SESSION['associazioneScelta'])){
        $queryAssociazione = "SELECT id_biglietto, id_artista FROM associato WHERE id={$_SESSION['associazioneScelta']}";
        $resultQ = mysqli_query($mysqliConnection,$queryAssociazione);
        $associazione = mysqli_fetch_array($resultQ);

        $queryDataOraConcerto = "SELECT dataOraConcerto FROM artista WHERE nome=\"{$associazione['id_artista']}\" ";
        $resultQ2 = mysqli_query($mysqliConnection,$queryDataOraConcerto);
        $dataOraConcerto = mysqli_fetch_array($resultQ2);

        $queryPrezzoBiglietto = "SELECT prezzo FROM biglietto WHERE tipo=\"{$associazione['id_biglietto']}\" ";
        $resultQ3 = mysqli_query($mysqliConnection,$queryPrezzoBiglietto);
        $prezzoBiglietto = mysqli_fetch_array($resultQ3);
    }


    if(isset($_POST['annulla']) || isset($_POST['conferma'])){
        if(isset($_POST['annulla'])){
            unset($_SESSION['associazioneScelta']);
            header("Location: band.php");
        }
        else{
            $queryCodFiscale = "SELECT codFiscale FROM utente WHERE email = \"{$_SESSION['emailUtente']}\" AND password=\"{$_SESSION['passwordUtente']}\" ";
            $resultQ4 = mysqli_query($mysqliConnection,$queryCodFiscale);
            $codiceFiscale = mysqli_fetch_array($resultQ4);

            $queryInsert = "INSERT INTO prenota(id_utente, id_associazione) VALUES (\"{$codiceFiscale[0]}\", {$_SESSION['associazioneScelta']});";

            try{
                if($resultQ5 = mysqli_query($mysqliConnection, $queryInsert)){
                    //ok
                    unset($_SESSION['associazioneScelta']);
                    header("Location: intro.php");
                }
                else{
                    printf("Problemi nell'inserire i dati nella tabella prenota\n");
                    exit();
                }

            }
            catch(mysqli_sql_exception $exception){
            }
        }
    }
    else{
        if(isset($_SESSION['accessoPermesso'])){
            unset($_SESSION['accessoPermesso']);
        }
        else{
            header("Location: band.php");
        }
    }
    
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <title>Sapienza Musical Festival</title>

    <style>
        <?php include "../CSS/confermaPrenotazione.css" ?>
    </style>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
</head>


<body>



<div class="containerImmagine"> 

<div class="containerBlur">

    <div class="containerCentrale">

        <h1>RIEPILOGO</h1>

        <div class="tabella">
            <div class="riga">
                <h3>ARTISTA:</h3>
                <h3><?php echo $associazione['id_artista'];?></h3>
            </div>
            <div class="riga">
                <h3>TIPO BIGLIETTO:</h3>
                <h3><?php echo $associazione['id_biglietto'];?></h3>
            </div>
            <div class="riga">
                <h3>DATA CONCERTO:</h3>
                <h3>
                    <?php
                        $temp = $dataOraConcerto[0];
                        $giorno = mb_substr($temp, 8,2);        
                        $mese = mb_substr($temp,5,2 );
                        $anno = mb_substr($temp,0,4 );
                        $ora = mb_substr($temp, 11, 5);

                        echo $giorno."-".$mese."-".$anno;
                    ?>
                </h3>
            </div>
            <div class="riga">
                <h3>ORARIO:</h3>
                <h3><?php echo $ora;?></h3>
            </div>
            <div class="riga">
                <h3>PREZZO:</h3>
                <h3><?php echo $prezzoBiglietto[0]?>&euro;</h3>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="riga">
                    <input type="submit" class="annullaButton black button" name="annulla" value="ANNULLA" />
                    <input type="submit" class="confermaButton black button" name="conferma" value="CONFERMA PRENOTAZIONE" />
                </div>
            </form>
        </div>
            
    </div>

</div>
</div>






</body>

</html>