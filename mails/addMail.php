<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = ''; //la tua gmail personale
$mail->Password = ''; //la tua password generata da gmail dalla sezione 'password per le app'
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom(''); //la tua gmail personale

$mail->addAddress(''); //indirizzo di arrivo dell'email
$mail->isHTML(true);

$mail->Subject = 'Edusogno Esercizio Master';
$mail->Body = "Evento aggiunto con Successo!!!  Evento: " . $_POST['nome_evento'] . ", Ora: " . $_POST['data_evento'];

$mail->send();
// if (isset($_POST['submit'])) {
 
// }
?>