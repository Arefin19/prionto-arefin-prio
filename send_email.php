<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access form data
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Set mailer to use SMTP
        $mail->isSMTP();

        // SMTP settings
        $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_username@example.com'; // SMTP username
        $mail->Password   = 'your_smtp_password'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; 'ssl' also accepted
        $mail->Port       = 587; // TCP port to connect to

        // Set sender and recipient
        $mail->setFrom('your_email@example.com', 'Your Name');
        $mail->addAddress('recipient@example.com', 'Recipient Name');

        // Set email content
        $mail->Subject = 'New message from contact form';
        $mail->Body    = "You have received a new message:\n\nEmail: $email\nMessage:\n$message";

        // Send email
        $mail->send();

        echo "Message sent successfully!";
    } catch (Exception $e) {
        echo "Message sending failed. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid form submission.";
}
?>
