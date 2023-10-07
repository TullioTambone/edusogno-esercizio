<?php
session_start();
$title = 'event - update event';
$userEmail = $_SESSION['email'];

include '../connection.php';
include '../eventController.php';

$eventController = new EventController($connection);

$nome_evento = $_GET['updatenome_evento'];
$data_evento = $_GET['updatedata_evento'];


if (isset($_POST['submit'])) {
    
    $id = (int)$_GET['updateid'];
    $attendees = $userEmail;
    $nome_evento = $_POST['nome_evento'];
    $data_evento = $_POST['data_evento'];

    $result = $eventController->updateEvent($id, $nome_evento, $data_evento);
    header("Location: ../dashboard.php");
} 


include '../mails/updateMail.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="../assets/styles/stylemain.css">
    <link rel="stylesheet" href="../assets/styles/navstyle.css">
    <link rel="stylesheet" href="../assets/styles/backgroundstyle.css">
</head>
<body>
<?php 
include '../assets/component/nav.php';
include '../assets/component/background.php';  
?>
    <div class="container">
        <form method="POST" class="form">
            <div class="input-div">
                <label class="label-form" for="nome_evento">Nome evento:</label>
                <input class="casella-input" type="text" name="nome_evento" id="nome_evento" value="<?php echo $nome_evento ?>">
            </div>
            
            <div class="input-div">
                <label class="label-form" for="data_evento">Data evento:</label>
                <input class="casella-input" type="datetime-local" name="data_evento" id="data_evento" value="<?php echo $data_evento ?>">
            </div>
            <button class="btn" type="submit" name="submit" id="update">Modifica Evento</button>
            <a class="link-rid" href="http://localhost/edusogno-esercizio-master/dashboard.php">
                <strong class="strong">torna indietro</strong>
            </a>
        </form>
    </div>

    <script src="../assets/js/script.js"></script>
</body>
</html>