# Guida alla Configurazione di PHPMailer con Gmail

Per utilizzare PHPMailer con un account Gmail, seguire questi passaggi:

## 1. Configura l'Account Google

1. Accedi al tuo account Google.

2. Naviga su [https://myaccount.google.com/security](https://myaccount.google.com/security).

3. Abilita la "Verifica in due passaggi":

4. Genera una Password per le App:

   - Nella sezione "Password per le app", seleziona "Genera Password".

## 2. Configura PHPMailer

Nei file PHP addMail.php, passwordMail.php e updateMail.php all'interno della cartella mails, sostituisci i campi con quelli corretti:

```php
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'mail@gmail.com'; // Inserisci la tua gmail personale
$mail->Password = 'password'; // Inserisci la password generata nel punto 4
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('mail@gmail.com'); // Inserisci la tua gmail personale

$mail->addAddress('mail@gmail.com'); // Inserisci l'indirizzo di arrivo dell'email
$mail->isHTML(true);