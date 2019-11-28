<?php
require_once './vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername(EMAIL)
    ->setPassword(PASSWORD);

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Verify Email</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #777;
          font-size: 1.3em;
        }
        a {
          background: green;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: #fff;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Thank you for signing up on our site. Please click on the link below 
        to verify your account:.</p>
        <a href="http://localhost/USER-VARIFICATION/index.php?token=' . $token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}
function sendPasswordResetLink($userEmail,$token){
  global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Verify Email</title>
      <style>
        .wrapper {
          padding: 20px;
          color: green;
          font-size: 1.3em;
        }
        a {
          background: yellow;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: yellow;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>Please click on the link below to reset your password:.</p>
        <a href="http://localhost/USER-VARIFICATION/index.php?password-token=' . $token . '">Reset Password</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Reset your password'))
        ->setFrom(EMAIL)
        ->setTo($userEmail)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }


}