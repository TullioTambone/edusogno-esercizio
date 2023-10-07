<?php
session_start();
$title = 'event - crud';
$userEmail = $_SESSION['email'];

include __DIR__ . '/connection.php';

$getNameQuery = "SELECT nome FROM utenti WHERE email = '$userEmail'";
$result = mysqli_query($connection, $getNameQuery);

if (!$result) {
    echo 'Errore nella query: ' . mysqli_error($connection);
} else {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['nome'];
}

$_SESSION['name'] = $userName;

//import del controller
include __DIR__ . '/eventController.php';
$eventController = new EventController($connection);
$events = $eventController->getEvents($userEmail);

if (!$events) {
    echo 'Errore nel recupero degli eventi.';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="./assets/styles/stylemain.css">
    <link rel="stylesheet" href="./assets/styles/navstyle.css">
    <link rel="stylesheet" href="./assets/styles/backgroundstyle.css">
</head>
<body>
<?php 
    include __DIR__ . '/assets/component/nav.php';
    include './assets/component/background.php';  
  ?>
    <main>
        <h2 id="title">Ciao <?php echo $userName; ?> ecco i tuoi eventi</h2>
        <div id="container">
            <?php foreach ($events as $e) {?>
                <div class="card">
                    <h3><?php echo $e->getNomeEvento(); ?></h3>
                    <span><?php echo $e->getDataEvento(); ?></span>
                    <button class="join">JOIN</button>
                    <div class="crud-btn">
                        <button class="modifica">
                            <a href="./crud/updateEvent.php?updateid=<?php echo $e->getId() ?>&updatenome_evento=<?php echo $e->getNomeEvento() ?>&updatedata_evento=<?php echo $e->getDataEvento() ?>">MODIFICA</a>
                        </button>
                        <button class="elimina">
                            <a href="./crud/deleteEvent.php?id=<?php echo $e->getId() ?>">ELIMINA</a>
                        </button>
                    </div>
                </div>
            <?php }?>
        </div>
    </main>

    <script src="./assets/js/script.js"></script>
</body>
</html>