<?php

class ContactController {

    public function send(){

        require 'vendor/autoload.php';

        use PHPMailer\PHPMailer\PHPMailer;

        if($_POST){

            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'herbyshawlouis@gmail.com';
            $mail->Password = 'bkyfwkrjqecmqpwc';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($_POST['email'], $_POST['name']);
            $mail->addAddress('herbyshawlouis@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = "Message Portfolio";
            $mail->Body = $_POST['message'];

            $mail->send();

            header("Location: index.php?page=contact&success=1");
        }
    }
}