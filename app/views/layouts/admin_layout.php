<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Admin - Herby PULSE</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* ================= THEME ================= */
:root{
    --navy:#0a1f44;
    --navy-dark:#06122a;
    --blue:#1d4ed8;
}

/* ================= BODY ================= */
body{
    margin:0;
    background:#f1f5f9;
    font-family:Segoe UI;
}

/* ================= HEADER FIXE ================= */
.admin-header{
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:1000;

    background:linear-gradient(90deg,var(--navy),var(--navy-dark));
    color:white;

    padding:12px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.admin-header .logo{
    font-weight:800;
}

.admin-header .actions{
    display:flex;
    gap:10px;
    align-items:center;
}

/* HEADER BUTTONS */
.btn-top{
    padding:6px 12px;
    border-radius:10px;
    font-size:13px;
    font-weight:600;
    text-decoration:none;
    transition:0.2s;
}

.btn-public{
    background:#ffffff;
    color:#0a1f44;
}

.btn-public:hover{
    background:#e2e8f0;
}

.btn-logout{
    background:#ef4444;
    color:white;
}

.btn-logout:hover{
    background:#dc2626;
}

/* ================= NAVBAR PUBLIC ================= */
.public-navbar{
    position:fixed;
    top:56px;
    left:0;
    right:0;
    z-index:999;

    background:white;
    padding:10px 25px;

    display:flex;
    justify-content:flex-end;
    gap:18px;

    border-bottom:1px solid #e5e7eb;
}

.public-navbar a{
    text-decoration:none;
    color:#0f172a;
    font-weight:500;
}

.public-navbar a:hover{
    color:var(--blue);
}

/* ================= LAYOUT ================= */
.admin-layout{
    display:flex;
    margin-top:110px;
    min-height:100vh;
}

/* ================= SIDEBAR ================= */
.sidebar{
    width:250px;
    background:linear-gradient(180deg,var(--navy),#020617);
    color:white;
    padding:20px;
    position:fixed;
    height:100%;
}

.sidebar h4{
    font-size:16px;
    font-weight:800;
    margin-bottom:20px;
}

.sidebar a{
    display:block;
    color:rgba(255,255,255,0.75);
    text-decoration:none;
    padding:10px 12px;
    border-radius:10px;
    margin-bottom:8px;
}

.sidebar a:hover{
    background:#1e293b;
    color:#38bdf8;
}

.sidebar .active{
    background:#38bdf8;
    color:#0f172a !important;
}

/* ================= CONTENT ================= */
.main-content{
    margin-left:260px;
    padding:25px;
    width:100%;
}

/* ================= FOOTER ================= */
.admin-footer{
    margin-top:40px;
    background:linear-gradient(90deg,var(--navy),var(--navy-dark));
    color:white;
    text-align:center;
    padding:12px;
    border-radius:10px;
}

</style>
</head>

<body>

<!-- ================= HEADER FIXE ================= -->
<div class="admin-header">

    <div class="logo">⚡ Herby PULSE Admin</div>

    <!-- ✔ ACTIONS HEADER -->
    <div class="actions">

        <!-- retour site public -->
        <a href="index.php?page=home" class="btn-top btn-public">
            🔙 Site public
        </a>

        <!-- logout -->
        <a href="index.php?page=logout" class="btn-top btn-logout">
            🚪 Logout
        </a>

    </div>
</div>

<!-- ================= NAVBAR PUBLIC ================= -->
<div class="public-navbar">
    <a href="index.php?page=home">Accueil</a>
    <a href="index.php?page=about">À propos</a>
    <a href="index.php?page=skills">Compétences</a>
    <a href="index.php?page=services">Services</a>
    <a href="index.php?page=cv">CV</a>
    <a href="index.php?page=contact">Contact</a>
</div>

<!-- ================= ADMIN LAYOUT ================= -->
<div class="admin-layout">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h4>⚡ Admin Panel</h4>

        <a href="index.php?page=admin" class="<?= ($_GET['page'] ?? '')=='admin'?'active':'' ?>">🏠 Dashboard</a>
        <a href="index.php?page=admin_add">➕ Projet</a>
        <a href="index.php?page=admin_clients">👥 Clients</a>
        <a href="index.php?page=devis">📩 Devis</a>

    </div>

    <!-- CONTENT -->
    <div class="main-content">

        <?php
        if (isset($contentView) && file_exists($contentView)) {
            include $contentView;
        } else {
            echo "<h4 class='text-danger'>Vue introuvable</h4>";
        }
        ?>

        <div class="admin-footer">
            © 2026 - Herby PULSE | Dashboard Admin
        </div>

    </div>

</div>

</body>
</html>