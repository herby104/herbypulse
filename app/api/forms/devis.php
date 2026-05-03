<?php
require "db.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $type = $_POST['type_projet'];
    $budget = $_POST['budget'];
    $details = $_POST['details'];

    $stmt = $pdo->prepare("
        INSERT INTO clients(nom,email,service,message)
        VALUES(?,?,?,?)
    ");

    $stmt->execute([$nom,$email,$type,$details]);

    $success = "Votre demande de devis a été envoyée !";
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<h2>📩 Demande de devis</h2>

<?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

<form method="POST">

<input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>

<input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

<select name="type_projet" class="form-control mb-2">
    <option>Site Web</option>
    <option>API REST</option>
    <option>Application Web</option>
    <option>Base de données</option>
</select>

<input type="text" name="budget" class="form-control mb-2" placeholder="Budget estimé">

<textarea name="details" class="form-control mb-2" placeholder="Décris ton projet"></textarea>

<button class="btn btn-primary w-100">📨 Envoyer devis</button>

</form>

</div>