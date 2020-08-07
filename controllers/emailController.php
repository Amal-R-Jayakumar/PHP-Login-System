<?php


require_once 'vendor/autoload.php';
require_once 'controllers/config/faculty_users.php';
// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendVerificationEmail($useremail, $token)
{
// Create a message
global $mailer;
$body='<!doctype html><html lang="en"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SmartUSRS Verification</title></head><body><div class="wrapper"><p>
Hello,<br>Thank you for using <h2>SmartUSRS.</h2> Please Click on the 
button below to veriy your email address.</p>
<a href="http://localhost/SmartUSRS/home.php?token=' . $token . '">
<button type="button" class="btn btn-primary">Verify</button></a>
</body></html>';
$message = (new Swift_Message('SmartUSRS Email Verification'))
  ->setFrom(EMAIL)
  ->setTo([$useremail])
  ->setBody($body, 'text/html');

// Send the message
$result = $mailer->send($message);
    
}

//PASSWORD RESET
function sendPasswordResetLink($useremail, $token){

global $mailer;
$body='<!doctype html><html lang="en"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>SmartUSRS Verification</title></head><body><div class="wrapper"><p>
Hello,<br>This is your <strong>SmartUSRS</strong> password reset link.</p>
<a href="http://localhost/SmartUSRS/home.php?password_token=' . $token . '">
<button type="button" class="btn btn-primary">Reset Password</button></a>
</body></html>';
$message = (new Swift_Message('SmartUSRS Password Reset'))
  ->setFrom(EMAIL)
  ->setTo([$useremail])
  ->setBody($body, 'text/html');

// Send the message
$result = $mailer->send($message);

}

