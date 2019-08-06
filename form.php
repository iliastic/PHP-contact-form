<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$userName= $_POST["name"];
$mailadres= $_POST["email"];
$bericht= $_POST["message"];

// Load Composer's autoloader
require 'vendor/autoload.php';

if (empty($_POST["name"])) {
    echo "Name is a Required Field";
    exit;
} else { 
    $userName = clean_data($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
             echo "Only letters and whitespace allowed in First Name";
             exit;
        }
}
if (empty($_POST["email"])) {
    echo "Email is a Required Field";
    exit;                
} else { 
    $mailadres = clean_data($_POST["email"]);
    if (!filter_var($mailadres, FILTER_VALIDATE_EMAIL)) {
        echo "Please make sure you entered a valid email";
        exit;
    }
}
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'mesbahiilias1@gmail.com';                     // SMTP username
    $mail->Password   = 'fqapqtwoourgdyqw';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('mesbahiilias1@gmail.com', 'Mesbahi Ilias');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Nieuw bericht van $mailadres";
    $mail->Body    = "Dit is het bericht van $userName: $bericht";
    $mail->AltBody = "Dit is het bericht van $userName: $bericht";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



