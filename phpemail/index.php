<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';


$email = new PHPMailer(true);

try {
  $email->isSMTP();
  $email->host        = "your mail server";
  $email->SMTPAuth    = true;
  $email->Username    = "username";
  $email->Password    = "password";
  $email->SMTPSecure  = 'tls';
  $email->Port        = 587;


  $email->setFom('sender@informatice.rg.gd');
  $email->addAddress('sender@informatice.rg.gd');
  $email->subject = 'Email from informative.rf.gd';
  $email->body = 'Hello there';

  $email->send();

  echo "Message sent";
} catch (Exception $e) {
  echo "Nessage not sent: ", $email->ErrorInfo;
}
