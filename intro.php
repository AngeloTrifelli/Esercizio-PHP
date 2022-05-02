<?php
    $classeErrore = "displayNone";
    $classeSuccesso = "displayNone";
    $emailErr = "displayNone";

    if (isset($_POST['invio'])){
        if( $_POST["nome"]=="" || $_POST['email']==""){
            $classeErrore = "errorLabel";
        }
        else{
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "errorLabel";
            }
            else{
                $classeErrore = "displayNone";
                $classeSuccesso = "successLabel";

            }
        }
    }
?>





<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Sapienza musical festival</title>
    <link rel="stylesheet" href="../CSS/intro.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
</head>



<body>
    <div class="top">
        <div class="navbar black shadow">
            <a href="#" class="navbar-item padding-large button">HOME</a> 
            <a href="#" class="navbar-item padding-large button">BAND</a> 
            <a href="#contatti" class="navbar-item padding-large button">CONTATTI</a>
            <div class="containerFlex">
                <a href="#" class="navbar-item padding-large button">REGISTRATI</a>
                <a href="#" class="navbar-item padding-large button">LOGIN</a>
            </div>
        </div>
    </div>

    <div class="containerImmagine">
        <img id=immagine src="../festival.jpg" />
    </div>

    <div class="content">
        <div class="articolo">
            <p  id=testoIntroduzione class="justify">
                Ami il rock ? O forse preferisci la musica elettronica?
                Il Sapienza Musical Festival fa al caso tuo ! Sapienza è lieta 
                di presentare collaborazioni con artisti di ogni genere,
                provenienti da ogni parte del mondo. Qui troverai sicuramente 
                la band che fa al caso tuo. Esplora la lista degli artisti in programma
                ed affrettati a prenotare un biglietto!
                Se non trovi nulla che ti soddisfa, non ti preouccupare! La lista degli 
                artisti è in continuo aggiornamento, quindi non dimenticare di consultarla
                per vedere se vi sono nuovi eventi in programma.
            </p>
        </div>

        <div class="articolo">
            <h2 class="center">CONTATTI</h2>

            <div id=contatti class="containerContatti">
                <div class="info">
                    <span>Latina, IT</span>
                    <span>Phone: 0773 000000</span>
                    <span>Email: mail@mail.com </span>
                </div>
                    

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
                    <div class="input">
                        <p id=scrittaNewsletter>ISCRIVITI ALLA NEWSLETTER</p>
                        <div class="riga1">
                            <input class="textInput" name="nome"  type="text" placeholder="Nome">
                            <input class="textInput" name="email" type="text" placeholder="Email"> 
                        </div>
                        <div class="riga2">
                            <input class="black invioButton" name="invio" value="INVIA" type="submit" >
                        </div>
                        <p class="<?php echo $classeErrore; ?>" >Dati mancanti! </p>
                        <p class="<?php echo $classeSuccesso; ?>" >Sei stato iscritto alla newsletter!</p>
                        <p class="<?php echo $emailErr; ?>" >Formato email non valido</p>
                    </div>
                </form>

            </div>
            
        </div>

    </div>
    
</body>


</html>