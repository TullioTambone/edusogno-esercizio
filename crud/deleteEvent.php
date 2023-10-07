<?php
session_start();

include '../connection.php';
include '../eventController.php';



if (isset($_GET['id'])) {
    $eventId = $_GET['id'];
    $userEmail = $_SESSION['email'];
    
    $eventController = new EventController($connection);
    $result = $eventController->deleteEvent($eventId, $userEmail);

    header("Location: ../dashboard.php");
}
?>