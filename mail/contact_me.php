<?php
// Allow form submissions only from your website (replace with your actual domain)
header("Access-Control-Allow-Origin: https://xanasa14.github.io");

// Check for empty fields
if(empty($_POST['name']) ||
   empty($_POST['email']) ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
  echo "No arguments Provided!";
  return false;
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

// Create the email and send the message
$to = 'xanasa14@gmail.com'; // Replace with your email address
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail:
$email_address\n\nMessage:\n$message";
$headers = "From: noreply@gmail.com\n"; // This is the email address the generated message will be from
$headers .= "Reply-To: $email_address";

// Send the email
if (mail($to, $email_subject, $email_body, $headers)) {
  echo "mail sent";
} else {
  // Log the error for troubleshooting (consider using a dedicated logging system)
  error_log("Email sending failed: " . error_get_last()['message']);
  echo "There was an error sending your message. Please try again later.";
}

return true;
?>