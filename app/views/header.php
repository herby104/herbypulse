<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Herby PULSE Portfolio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
body{
    font-family: "Segoe UI", sans-serif;
    background:#f8fafc;
}

/* NAVBAR */
.glass-navbar{
    position:sticky;
    top:0;
    z-index:999;
    background:linear-gradient(135deg,#061a3a,#0b2a5b,#0f3b7a);
    box-shadow:0 8px 30px rgba(0,0,0,.35);
}

.navbar .nav-link{
    color:rgba(255,255,255,.85)!important;
}

.navbar .nav-link:hover{
    color:#38bdf8!important;
}

.btn-devis{
    background:#38bdf8;
    color:#061a3a!important;
    font-weight:700;
    border-radius:10px;
}
</style>

</head>

<body>

<nav class="navbar navbar-expand-lg glass-navbar">
<div class="container">

    <a class="navbar-brand text-white fw-bold" href="index.php">
        ⚡ Herby PULSE
    </a>

    <div class="collapse navbar-collapse show">

        <ul class="navbar-nav ms-auto">

            <li><a class="nav-link" href="index.php?page=home">Accueil</a></li>
            <li><a class="nav-link" href="index.php?page=about">À propos</a></li>
            <li><a class="nav-link" href="index.php?page=skills">Compétences</a></li>
            <li><a class="nav-link" href="index.php?page=services">Services</a></li>

            <li class="ms-2">
                <a class="btn btn-devis btn-sm" href="index.php?page=devis">📩 Devis</a>
            </li>

            <li><a class="nav-link" href="index.php?page=cv">CV</a></li>
            <li><a class="nav-link" href="index.php?page=contact">Contact</a></li>

            <?php if (!empty($_SESSION['admin'])): ?>
                <li class="ms-3">
                    <a class="btn btn-warning btn-sm" href="index.php?page=admin">Dashboard</a>
                </li>
                <li class="ms-2">
                    <a class="btn btn-danger btn-sm" href="index.php?page=logout">Logout</a>
                </li>
            <?php else: ?>
                <li class="ms-3">
                    <a class="btn btn-outline-info btn-sm" href="index.php?page=login">Admin</a>
                </li>
            <?php endif; ?>

        </ul>

    </div>

</div>
</nav>