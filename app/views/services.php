<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Services - Herby Portfolio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

/* ================= GLOBAL ================= */
body {
    font-family: "Segoe UI", sans-serif;
    background: #f8fafc;
    color: #0f172a;
    margin: 0;
}

/* ================= HERO ================= */
.hero {
    text-align: center;
    padding: 80px 20px 40px;
}

.hero h1 {
    font-weight: 800;
    font-size: 2.8rem;
    color: #061a3a;
}

.hero p {
    opacity: 0.75;
    font-size: 1.1rem;
}

/* ================= SERVICE CARDS ================= */
.service-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: 0.3s ease;
    height: 100%;
    border: 1px solid rgba(0,0,0,0.04);
}

.service-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 45px rgba(0,0,0,0.15);
}

.service-icon {
    font-size: 42px;
    color: #0ea5e9;
    margin-bottom: 12px;
}

/* ================= PRICING ================= */
.price {
    font-size: 20px;
    font-weight: 700;
    color: #061a3a;
    margin-top: 10px;
}

/* ================= CTA ================= */
.cta {
    background: linear-gradient(135deg, #061a3a, #0b2a5b);
    color: white;
    text-align: center;
    padding: 60px 20px;
    border-radius: 18px;
    margin-top: 60px;
}

.btn-cta {
    background: #38bdf8;
    color: white;
    padding: 12px 25px;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    margin-top: 10px;
    transition: 0.3s;
}

.btn-cta:hover {
    background: #0ea5e9;
    transform: scale(1.05);
}

/* ================= CONTACT INFO ================= */
.contact-info {
    margin-top: 15px;
    font-size: 14px;
    opacity: 0.9;
}

/* ================= WHATSAPP FLOAT ================= */
.whatsapp {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #25D366;
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    text-decoration: none;
    z-index: 999;
    transition: 0.3s;
}

.whatsapp:hover {
    transform: scale(1.1);
}

</style>

</head>

<body>

<!-- ================= HERO ================= -->
<div class="hero">
    <h1>💼 Mes Services Professionnels</h1>
    <p>Développement web, API REST et solutions digitales modernes</p>
</div>

<!-- ================= SERVICES ================= -->
<div class="container">
<div class="row g-4">

    <div class="col-md-4">
        <div class="service-card text-center">
            <div class="service-icon"><i class="bi bi-laptop"></i></div>
            <h4>Site Web Vitrine</h4>
            <p>Création de sites modernes, rapides et responsive pour entreprises et portfolio.</p>
            <div class="price">100$ - 300$</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="service-card text-center">
            <div class="service-icon"><i class="bi bi-server"></i></div>
            <h4>API REST</h4>
            <p>Développement d’API PHP / Laravel / connexion base de données sécurisée.</p>
            <div class="price">150$ - 500$</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="service-card text-center">
            <div class="service-icon"><i class="bi bi-database"></i></div>
            <h4>Base de données</h4>
            <p>Conception, optimisation et gestion MySQL / Oracle / systèmes complexes.</p>
            <div class="price">Sur devis</div>
        </div>
    </div>

</div>

<!-- ================= CTA ================= -->
<div class="cta mt-5">

    <h2>🚀 Prêt à travailler ensemble ?</h2>
    <p>Discutons de ton projet et trouvons la meilleure solution</p>

    <a href="index.php?page=devis" class="btn btn-primary mt-2">
        📩 Demander un devis
    </a>

    <a href="https://wa.me/50946301034" class="btn-cta">
        💬 WhatsApp direct
    </a>

    <div class="contact-info">
        📧 Email : herbyshawlouis@gmail.com <br>
        📍 Disponible pour projets freelance & remote
    </div>

</div>

</div>

<!-- ================= WHATSAPP FLOAT ================= -->
<a href="https://wa.me/50946301034" class="whatsapp">
    <i class="bi bi-whatsapp"></i>
</a>

</body>
</html>