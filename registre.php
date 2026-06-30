<?php 

include("connection.php");  // Inclut le fichier de connexion à la base de données
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/autoload.php';


if(isset($_POST['signup-submit'])){
    $uname = $_POST['username'];
    $email = $_POST['email'];
    $pword = $_POST['password'];
    $confirm = $_POST['confirmpassword'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
 
        //SMTP username
        $mail->Username = 'your_email@gmail.com';

        //SMTP password
        $mail->Password = 'your_password';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'your_website_name');

        //Add a recipient
        $mail->addAddress($email, $uname);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();
        // echo 'Message has been sent';

        $encrypted_password = password_hash($pword, PASSWORD_DEFAULT);

        // connect with database
        $conn = mysqli_connect("localhost:8889", "root", "root", "showroom");

        // insert in users table
        $sql = "INSERT INTO users(username,pword,email,conpw, verification_code, email_verified_at) VALUES ('" . $uname . "', '" . $email . "', '" . $pword . "', '" . $verification_code . "', NULL)";
        mysqli_query($conn, $sql);

        header("Location: email-verification.php?email=" . $email);
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }
    

    
?>