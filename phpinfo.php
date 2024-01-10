<?php
$to = "your_email@example.com";
$subject = "Test Email";
$message = "This is a test email.";

if (mail($to, $subject, $message)) {
    echo "Mail sent successfully!";
} else {
    echo "Mail sending failed.";
}
?>
