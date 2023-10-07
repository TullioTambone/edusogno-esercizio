<?php
include __DIR__ . '/connection.php';

$user_query = 'SELECT * FROM utenti;';
$event_query = 'SELECT * FROM eventi;';

$user_result = mysqli_query($connection,$user_query);
$event_result = mysqli_query($connection,$event_query);

if (!$user_result || mysqli_num_rows($user_result) === 0 || !$event_result || mysqli_num_rows($event_result) === 0){
    $query = "INSERT INTO utenti (nome, cognome, email, password) VALUES
        ('Marco', 'Rossi', 'ulysses200915@varen8.com', 'Edusogno123'),
        ('Filippo', 'D\'Amelio', 'qmonkey14@falixiao.com', 'Edusogno?123'),
        ('Gian Luca', 'Carta', 'mavbafpcmq@hitbase.net', 'EdusognoCiao'),
        ('Stella', 'De Grandis', 'dgipolga@edume.me', 'EdusognoGia');";
    
    $query .= "INSERT INTO eventi (attendees, nome_evento, data_evento) VALUES
        ('ulysses200915@varen8.com,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net', 'Test Edusogno 1', '2022-10-13 14:00'),
        ('dgipolga@edume.me,qmonkey14@falixiao.com,mavbafpcmq@hitbase.net', 'Test Edusogno 2', '2022-10-15 19:00'),
        ('dgipolga@edume.me,ulysses200915@varen8.com,mavbafpcmq@hitbase.net', 'Test Edusogno 3', '2022-10-15 19:00');";
    
    $result = mysqli_multi_query($connection, $query);
    
    // if ($result) {
    //     echo "Migrazione eseguita con successo!";
    // } else {
    //     echo "Errore nella migrazione: " . $connection->error;
    // }
}    

?>