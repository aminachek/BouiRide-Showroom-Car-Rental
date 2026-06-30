<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $msg = htmlspecialchars($_POST['message']);
  if (!empty($name) && !empty($email) && !empty($msg)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $receiver = "bouiride.10@gmail.com"; // Entrez l'adresse e-mail oÃ¹ vous souhaitez recevoir tous les messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nMessage:\n$msg";
      $sender = "From: $email";
      if (mail($receiver, $subject, $body, $sender)) {
        echo "Your message has been sent";
      } else {
        echo "Sorry, failed to send your message!";
      }
    } else {
      echo "Enter a valid email address!";
    } 
  } else {
    if (empty($name)) {
      echo "Enter your name!";
    } else {
      echo "Email and message field is required!";
    }
  }
?>