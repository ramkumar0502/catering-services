<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Required files
require 'PHPMailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';
 
if (isset($_POST["send"])) {
    $name = $_POST["name"];      // User name
	$phone = $_POST["phone"]; 
    $email = $_POST["email"];    // User email
    $message = $_POST["comment"];

    $mail = new PHPMailer(true);
    $mail->isSMTP();                                   // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                          // Enable SMTP authentication
    $mail->Username   = 'gttesting659@gmail.com';      // SMTP username
    $mail->Password   = 'eqbf athq cybh cqqc';         // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   // Enable implicit SSL encryption
    $mail->Port       = 465;      

    // Recipients
    $mail->setFrom($email, $name);     // Sender Email and name
    $mail->addAddress('gttesting659@gmail.com');    // Add a recipient email  
    $mail->addReplyTo($email, $name);  // Reply to sender email

    // Content
    $mail->isHTML(true);               // Set email format to HTML
    $mail->Subject = "Order form $name " ;
    $mail->Body = "<p>Name: $name</p> <p>phone number: $phone</p><p>Email form: $email</p><p>Location: $message</p>"; // Constructing email message
   
    // Try to send the email
    if ($mail->send()) {
        // Send success response to JavaScript
        echo '<script>';
        echo 'alert("Email successfully sent!");';  // JavaScript alert box
        echo 'window.location.href = "index.html";'; // Redirect back to index.html
        echo '</script>';
		
    } else {
        // Send error response to JavaScript
        echo '<script>';
        echo 'alert("Error: Unable to send email.");'; // JavaScript alert box
        echo 'window.location.href = "index.html";'; // Redirect back to index.html
        echo '</script>';
    }
}
?>
