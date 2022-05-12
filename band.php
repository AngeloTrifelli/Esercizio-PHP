<?xml version="1.0" encoding="UTF-8"?>
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
    
          <a href="./intro.php" class="navbar-item padding-large button">HOME</a>
          <a href="./login.php" class="navbar-item padding-large button floatRight">LOGIN</a>
          <a href="./registrazione.php" class="navbar-item padding-large button floatRight">REGISTRATI</a>
           
        </div>

        <div class="band paragraph">
            <h1>Pink Floyd</h1>
            <p>
                <img class="immagine" src="../img/pink-floyd.jpg" alt="immagine non trovata!" align="middle">

            </p>
            <p class="articolo">
                I Pink Floyd sono stati un gruppo rock britannico, fondato a Londra nel 1965.
                <br />
                Con la scrittura di Roger Waters e le fantasche melodie di David Guilmoure hanno rappresentato una
                vera e propria epoca del rock e del progressive. 
                <br />
                Al Sapienza Musical Festival potrai ritornare indietro nel tempo e essere presente 
                al ritorno di questa band leggendaria.
            </p>
        </div>
        <div>
            <table class="biglietto" align="center">
                <tr>
                    <td class="data">26 Maggio 2022</td>
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
      
</body>

</html>
