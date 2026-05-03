<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ======================
    // 🔹 RÉCUPÉRATION DONNÉES
    // ======================
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // ======================
    // 🔒 VALIDATION NOM
    // ======================
    if (!preg_match("/^[A-Za-zÀ-ÿ\s]+$/", $name)) {
        die("❌ Nom invalide !");
    }

    if (empty($message)) {
        die("❌ Message requis !");
    }

    // ======================
    // EMAIL FIXE (SECURISÉ)
    // ======================
    $to = "herbyshawlouis@gmail.com";

    $mail = new PHPMailer(true);

    try {

        // SMTP GMAIL
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'herbyshawlouis@gmail.com';
        $mail->Password = 'bkyfwkrjqecmqpwc';

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // DESTINATAIRE
        $mail->setFrom($email, $name);
        $mail->addAddress($to);

        // CONTENU
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message portfolio";
        $mail->Body = "
            <h3>Nouveau message</h3>
            <p><b>Nom:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Message:</b><br>$message</p>
        ";

        $mail->send();

        echo "<script>
            alert('Message envoyé avec succès');
            window.location='index.php?page=contact';
        </script>";

    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }
}
?>