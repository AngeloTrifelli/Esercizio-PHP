<?php 
    require_once("connection.php");
    
    session_start();
    if(!isset($_SESSION['emailUtente']) || !isset($_SESSION['passwordUtente'])){
            header("Location: login.php");
            exit();
    }

    $queryDatiUtente= "SELECT * FROM utente WHERE email=\"{$_SESSION['emailUtente']}\" AND password=\"{$_SESSION['passwordUtente']}\"" ;

    $resultQ= mysqli_query($mysqliConnection,$queryDatiUtente);
        $utente= mysqli_fetch_array($resultQ);
    

    $queryPrenotazioni= "SELECT artista.dataOraConcerto, associato.id_artista,associato.id_biglietto FROM prenota,associato,artista WHERE prenota.id_associazione = associato.id AND prenota.id_utente=\"{$utente['codFiscale']}\" AND associato.id_artista = artista.nome ";
    $resultQ2= mysqli_query($mysqliConnection, $queryPrenotazioni);
    

?>



<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Profilo utente</title>

<style>
  <?php include "../CSS/paginaUtente.css" ?>
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="top">
<div class="navbar black shadow">
          <a href="./intro.php" class="navbar-item padding-large button">HOME</a>
          <a href="./band.php" class="navbar-item padding-large button">BAND</a> 
        </div>
</div>

         <h1>Ciao Simone! <i class="fa-solid fa-hand"></i></h1>
         
         <div class="mainItem">
         <div class="icon-person">
         <i class="fa-solid fa-chalkboard-user"></i>
        </div>

            <div>

            <h3 class="firstTitle">IL TUO PROFILO:</h3>
                 <ul>
                   <li><strong>Nome:</strong><?php echo $utente['nome']; ?></li>
                   <li><strong>Cognome:</strong><?php echo $utente['cognome']; ?></li>
                   <li><strong>Codice Fiscale:</strong><?php echo $utente['codFiscale']; ?></li>
                   <li><strong>Data di nascita:</strong><?php echo $utente['dataNascita']; ?></li>
                   <li><strong>Indirizzo di domicilio:</strong><?php echo $utente['via']." ".$utente['civico']; ?></li>
                   <li><strong>Email:</strong><?php echo $utente['email']; ?></li>

                </ul>
            </div>
            
        </div>

        <hr>


       

        <div class="mainItem">
            <h3 class="secondTitle"><i class="fa-solid fa-calendar"></i> Le tue prenotazioni:</h3>
            <?php
            while($prenotazione= mysqli_fetch_array($resultQ2))
            {
?>
            <div>
                <table class="biglietto" align="center">
                    <tr>
                            <td>Data:<br /><?php 
                             $temp= $prenotazione[0];
                             $giorno = mb_substr($temp, 8,2);        //Funzione per estrarre una sottostringa
                             $mese = mb_substr($temp,5,2 );
                             $anno = mb_substr($temp,0,4 );
                             $ora = mb_substr($temp, 11, 5);
                             echo $giorno."/".$mese."/".$anno." ".$ora;
                             ?></td>

                            <td>Artista:<br /><?php echo $prenotazione[1]; ?></td>

                            <td>Tipologia biglietto:<br /><?php echo $prenotazione[2]; ?></td>
                        

                    </tr>
                
                </table>
                <br />
                <?php
            }
            ?>
                <div class="guitar">
                <i class="fa-solid fa-guitar"></i>
                </div>
                
            </div>
        </div>



</body>

</html>