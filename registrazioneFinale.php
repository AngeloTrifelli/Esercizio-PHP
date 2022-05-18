<?php
    require_once("./connection.php");
    $emailErr = "False";

    

    session_start();
   
    

    if (!isset($_POST['registrati'])){
        if (!isset($_SESSION['accessoPermesso'])){     
            header('Location: registrazione.php');
        }
        else{
            unset($_SESSION['accessoPermesso']);       
        }
    }
    else{    
        if($_POST['email']!="" && $_POST['password']!="" && $_POST['confermaPassword']!="" && $_POST['password']==$_POST['confermaPassword']){

            $email = $_POST['email'];
            $password = $_POST['password'];

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "True";
            }
            else{
                $_SESSION['email'] = $_POST['email'];   //Imposto questa variabile di sessione in modo tale da permettere di effettuare il controllo dentro registrazioneCompletata.php



                $queryInsert = "INSERT INTO utente VALUES
                ('{$_SESSION['nome']}' , '{$_SESSION['cognome']}' , '{$_SESSION['codFisc']}' , '{$_SESSION['dataNascita']}' , '{$_SESSION['domicilio']}' , '{$_SESSION['numCiv']}' , '$email' , '$password' );";

    

                try{
                    if($resultQ = mysqli_query($mysqliConnection, $queryInsert)){
                        //ok
                        header('Location: registrazioneCompletata.php');
                        exit();
                    }
                    else{
                        printf("Problemi nell'inserire i dati nella tabella utente\n");
                        exit();
                    }

                }
                catch(mysqli_sql_exception $exception){
                }
            } 
        }
    }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <title>Sapienza Musical Festival</title>

    <style>
        <?php include "../CSS/registrazioneFinale.css"   ?>
    </style>
</head>


<body>

<div class="top">
        <div class="navbar black shadow">
            <a href="./registrazione.php" class="navbar-item padding-large button">TORNA INDIETRO</a> 
        </div>
</div>








<div class="containerImmagine"> 

<div class="containerBlur">

    <div class="containerCentrale">

        <h1>REGISTRAZIONE UTENTE</h1>

        <div class="tabella">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                <div class="zonaInput">
                    <?php
                        if(isset($_POST['email'])){
                            echo "<input class=\"textInput\" type=\"text\" name=\"email\" value=\"{$_POST['email']}\" placeholder=\"Inserisci l'email\"   >";
                        }
                        else{
                            echo "<input class=\"textInput\" type=\"text\" name=\"email\" placeholder=\"Inserisci l'email\" >";     
                        }
                        if(isset($_POST['registrati']) && $_POST['email']==""){
                            echo "
                                <p class=\"errorLabel\">Inserire l'email!</p> 
                            ";
                        }
                        else{
                            if($emailErr=="True"){
                                echo "
                                    <p class=\"errorLabel\">Formato di email non valido!</p>
                                ";
                            }
                        }
                    ?>
                    <input class="textInput" type="password" name="password" placeholder="Inserisci la password" />
                    <?php 
                        if(isset($_POST['registrati']) && $_POST['password']==""){
                            echo "
                                <p class=\"errorLabel\">Inserire la password!</p> 
                            ";
                        }

                    ?>
                    <input class="textInput" type="password" name="confermaPassword" placeholder="Conferma password" />
                    <?php 
                        if(isset($_POST['registrati']) && $_POST['password']!="" && $_POST['password']!=$_POST['confermaPassword']){
                            echo "
                            <p class=\"errorLabel\">Le password inserite non corrispondono!</p> 
                            ";
                        }
                    ?>

                    
                    <input type="submit" class="continuaButton black button" name="registrati" value="Registrati" />
                    

                </div>

                

               

            </form>

        </div>
            
    </div>

</div>
</div>






</body>

</html>
