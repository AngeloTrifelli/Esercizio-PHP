<?php
    require_once("connection.php");


    session_start();
    if(!isset($_SESSION['email'])){        //Ora controllo questa variabile di sessione per verificare che l'utente sia arrivato in questa pagina passando per registrazioneFinale.php
        header('Location: registrazione.php');
        exit();
    }
    else{
        unset($_SESSION);
        session_destroy();
        header( "refresh:5;url=login.php" );
    }
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <title>Sapienza Musical Festival</title>

    <style>
        <?php include "../CSS/registrazioneCompletata.css"   ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>

<div class="containerImmagine"> 

<div class="containerBlur">

    <div class="containerCentrale">

        <h1>REGISTRAZIONE COMPLETATA <i class="fa-solid fa-check"></i></h1>

        <div class="tabella">
            <h3>Verrai reindirizzato alla pagina di Login tra 5 secondi...</h3>

        </div>
            
    </div>

</div>
</div>






</body>

</html>
