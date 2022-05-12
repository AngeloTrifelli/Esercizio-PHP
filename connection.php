<?php
$host = "localhost";
$mysql_user = "lweb43";
$mysql_password = "lweb43";
$db_name = "lweb43";

$mysqliConnection = new mysqli($host, $mysql_user, $mysql_password, $db_name);


if (mysqli_errno($mysqliConnection)){
    printf("Problemi di connessione al database\n%s\n", mysqli_error($mysqliConnection));
    exit();
}

?>