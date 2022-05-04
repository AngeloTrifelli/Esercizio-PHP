



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <title>Sapienza Musical Festival</title>
    <link rel="stylesheet" href="../CSS/registrazione.css" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
</head>


<body>
    <div class="containerImmagine"> </div>


    <div class="containerCentrale">
            <h1>REGISTRAZIONE UTENTE</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                <div class="riga">
                    <input type="text" name="nome" placeholder="Inserisci il nome" />
                    <input type="text" name="cognome" placeholder="Inserisci il cognome" />
                </div>
                
                <div class="riga">
                    <input type="text" name="codFisc" placeholder="Inserisci il codice fiscale" />
                    <input type="date" name="dataNascita" />
                </div>
                
                
              
            </form>
    </div>
 
   





</body>





</html>