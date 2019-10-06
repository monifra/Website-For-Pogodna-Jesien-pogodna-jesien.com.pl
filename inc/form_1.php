dziekujemy za wiadomosc<?php
	if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']))
	{
		return false;
	}

	$name = $_POST['user_name'];
	$email = $_POST['user_email'];
	$message = $_POST['user_text'];

	$to = 'pogodna@jesien.com.pl'; // Email submissions are sent to this email

	// Create email
	$email_subject = "Message from STRONA.";
	$email_body = "You have received a new message. \n\n".
				  "Name: $name \nEmail: $email \nMessage: $message \n";
	$headers = "From: pogodna@jesien.com.pl\n";
	$headers .= "Reply-To: $email";

	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;



?>
