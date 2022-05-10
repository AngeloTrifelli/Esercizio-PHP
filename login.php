<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['invio']))          /* abbiamo appena dato dati, cioe' questo script 
									    funge da action per la form di login */

  if (empty($_POST['userName']) || empty($_POST['password']))
    echo "<p>Dati mancanti!</p>";
  else                               // controllo dati
    if ( ($_POST['userName']=="jonathan") && ($_POST['password']=="archer") ) { //ok
      session_start();
      $_SESSION['userName']=$_POST['userName'];
      $_SESSION['dataLogin']=time();
      $_SESSION['accessoPermesso']=1000;
      header('Location: ST.inizio.php');    // accesso alla pagina iniziale
      exit();
    }
    else {
    echo "<p>Accesso negato!</p>";
  }
?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Login Sapienza Musical Festival</title>

<style>
  <?php include "../CSS/login.css" ?>
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
</head>

<body>
<div class="container flex-container navbar">
          <a href="./intro.php" class="button">TORNA ALLA PAGINA INIZIALE</a>
        </div>
<div class="containerImmagine">
        <div class="containerBlur">
        <div class="containerCentrale">
            <h1>LOGIN</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                <div class="riga">
                    <input class="textInput" type="text" name="email" placeholder="Email" />
                    <input class="textInput" type="text" name="password" placeholder="Password" />
                    <input class="bottone" type="button" value="Accedi">
                </div>
                <div id="registrazione">
                <a  href="./registrazione.php">Non sei ancora iscritto? Clicca qui!</a>
                </div>
                </form>
        </div>

         </div>

    </div>

</body>
</html>