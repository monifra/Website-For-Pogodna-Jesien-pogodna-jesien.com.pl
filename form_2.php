<?php

  use PHPMailer\PHPMailer\PHPMailer;
  require 'vendor/phpmailer/src/PHPMailer.php';
  require 'vendor/phpmailer/src/Exception.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){



    $name = trim(filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST,'user_email',FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST,'user_text',FILTER_SANITIZE_SPECIAL_CHARS));


    if ($name == "" || $email == "" || $message == ""){
      $error_message = "Proszę uzupelnic wymagane pole: Imie i nazwisko, email, wiadomosc";
      // exit;
    }

    if(!PHPMailer::validateAddress($email)) {
      $error_message = "Niepoprawny adres email";
      // exit;
    }

    if(!isset($error_message)){

      $email_body .= "";
      $email_body .=  "Name " . $name . "\n";
      $email_body .= "Email " . $email . "\n";
      $email_body .= "Message " . $message . "\n";



      //wyslanie maila
      $mail = new PHPMailer;
      //$mail->isSMTP();
      //$mail->Host = 'localhost';
      //$mail->Port = 2500;
      $mail->CharSet = 'utf-8';
      //It's important not to use the submitter's address as the from address as it's forgery,
      //which will cause your messages to fail SPF checks.
      //Use an address in your own domain as the from address, put the submitter's address in a reply-to
      $mail->setFrom('pogodna@jesien.com.pl', $name);
      $mail->addReplyTo($email, $name);
      $mail->addAddress('pogodna@jesien.com.pl', 'Pensjonat Pogodna Jesien');
      $mail->Subject = 'Wiadomosc ze strony Pogodna Jesien od ' . $name;
      $mail->Body = $email_body;

      if ($mail->send()) {
          header("location:index.html");
          exit;
      }
      $error_message = "Mailer Error: " . $mail->ErrorInfo;
      }
}

?>
