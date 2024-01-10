<?php
// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments provided!";
    return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'alanis40050@gmail.com'; // Cambia esto con tu dirección de correo electrónico
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n"
    . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";

$headers = "From: noreply@yourdomain.com\r\n"; // Cambia esto con la dirección de correo deseada
$headers .= "Reply-To: $email_address\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$mail_result = mail($to, $email_subject, $email_body, $headers);

if (!$mail_result) {
    $error_info = error_get_last();
    echo "Error al enviar el correo: " . print_r($error_info, true);
    return false;
}

echo "Correo enviado con éxito!";
return true;
?>
