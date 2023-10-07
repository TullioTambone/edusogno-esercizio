<?php

//connecting to my databse

//                 nome del server, nome user, password, nome database
$connection = new mysqli('localhost','root','root','edusogno-db');

// se non c'è connessione interrompi l'esecuzione dello script
if(!$connection){
    die(mysqli_error($connection));
}