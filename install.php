<?php

mysqli_report(MYSQLI_REPORT_ALL);

require_once("connection.php");
ini_set('display_errors', 1);


$CreaTabellaUtenti = "CREATE TABLE IF NOT EXISTS utente(
        nome varchar(100) not null,
        cognome varchar(100) not null,
        codFiscale char(16) primary key,
        dataNascita date not null,
        via varchar(100) not null,
        civico int not null,
        email varchar(100) not null,
        password varchar(100) not null
    );";


if($resultQ = mysqli_query($mysqliConnection, $CreaTabellaUtenti)){
    //ok
}
else{
    printf("Impossibile creare la tabella utenti\n");
    exit();
}




// $CreaTabellaArtisti = "CREATE TABLE IF NOT EXISTS artista(
//         nome varchar(100) primary key,
//         linkImmagine varchar(max) not null,
//         descrizione varchar(max) not null
//         dataOraConcerto timestamp not null
//     );";


// if($resultQ = mysqli_query($mysqliConnection, $CreaTabellaArtisti)){
//     //ok
// }
// else{
//     printf("Impossibile creare la tabella artisti\n");
//     exit();
// }






// $CreaTabellaBiglietti = "CREATE TABLE IF NOT EXISTS biglietto(
//         tipo varchar(100) primary key,
//         prezzo real not null,

//         check(prezzo > 0)
//     );";

// if($resultQ = mysqli_query($mysqliConnection, $CreaTabellaBiglietti)){
//     //ok
// }
// else{
//     printf("Impossibile creare la tabella biglietto\n");
//     exit();
// }





// $CreaTabellaPrenotazioni = "CREATE TABLE IF NOT EXISTS prenota(
//         id serial primary key,
//         id_utente varchar(16) references utente(codFiscale),
//         id_associazione int references associato(id)
//     );";

// if($resultQ = mysqli_query($mysqliConnection, $CreaTabellaPrenotazioni)){
//     //ok
// }
// else{
//     printf("Impossibile creare la tabella prenota\n");
//     exit();
// }





// $CreaTabellaAssociato = "CREATE TABLE IF NOT EXISTS associato(
//         id serial primary key,
//         id_biglietto varchar(100) references biglietto(tipo),
//         id_artista varchar(100) references artista(nome),
//         numPosti int not null,

//         check(numPosti > 0),
//         unique(id_biglietto,id_artista)
//     );";


// if($resultQ = mysqli_query($mysqliConnection, $CreaTabellaAssociato)){
//     //ok
// }
// else{
//     printf("Impossibile creare la tabella prenota\n");
//     exit();
// }



// // INIZIO INSERIMENTO DATI 

// $InserimentoDatiArtisti = "INSERT INTO artista VALUES 
// ('Green Day', 'https://dynamicmedia.livenationinternational.com/Media/w/b/t/aee34fb2-a93f-402e-a7a3-89f745cc6352.jpg' , 'I Green Day sono un gruppo musicale pop punk statunitense formatosi a Berkeley nel 1986 e composto da tre membri: Billie Joe Armstrong (chitarra e voce), Mike Dirnt (basso e voce secondaria) e Tré Cool (batteria).
// Sono tra i gruppi musicali con più vendite della storia, avendo venduto più di 85 milioni di dischi in tutto il mondo. Inoltre la rivista Rolling Stone, li ha inseriti nella lista New Immortals, elenco degli artisti definiti le nuove leggende della storia della musica.
// Nel 1994, grazie al successo del loro terzo album Dookie, il quale, con 10 dischi di platino e uno di diamante, ha venduto più di 10 milioni di copie solo negli Stati Uniti e 15 in tutto il mondo, sono stati annoverati, insieme a gruppi come Offspring e Rancid, tra le band che hanno riportato il punk rock nella musica mainstream.' , '2022-06-16 18:00'),
// (... ),
// (... );";


// try{
//     if($resultQ = mysqli_query($mysqliConnection, $InserimentoDatiArtisti)){
//         //ok
//     }
//     else{
//         printf("Problemi nell'inserire i dati nella tabella artisti\n");
//         exit();
//     }

// }
// catch(mysqli_sql_exception $exception){
// }











?>