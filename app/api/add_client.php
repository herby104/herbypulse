<?php
require "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ======================
    // 📥 DONNÉES CLIENT
    // ======================
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $service = $_POST['service'];
    $message = $_POST['message'];

    // ======================
    // 💾 INSERTION DB
    // ======================
    $stmt = $pdo->prepare("
        INSERT INTO clients(nom,email,telephone,service,message)
        VALUES(?,?,?,?,?)
    ");

    $stmt->execute([$nom,$email,$telephone,$service,$message]);

    // ======================
    // 📲 WHATSAPP CLIENT
    // ======================
    $clientPhone = "50900000000"; // 👉 TON NUMERO WHATSAPP BUSINESS

    $clientMsg = "👋 Bonjour $nom,

Merci pour votre demande de service : *$service*.

Nous avons bien reçu votre message et nous vous contacterons très bientôt.

🙏 Herby Portfolio";

    $clientUrl = "https://wa.me/$clientPhone?text=" . urlencode($clientMsg);

    // ======================
    // 📲 WHATSAPP ADMIN (TOI)
    // ======================
    $adminPhone = "50946301034"; // 👉 ton WhatsApp personnel

    $adminMsg = "📊 NOUVEAU CLIENT REÇU

👤 Nom: $nom
📧 Email: $email
📞 Téléphone: $telephone
💼 Service: $service
📝 Message: $message";

    $adminUrl = "https://wa.me/$adminPhone?text=" . urlencode($adminMsg);

    // ======================
    // 🔁 REDIRECTION (CLIENT D'ABORD)
    // ======================
    header("Location: $clientUrl");
    exit;
}
?>