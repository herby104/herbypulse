<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* ================= GLOBAL ================= */
body {
    background: #ffffff;
    color: #0f172a;
    font-family: "Segoe UI", sans-serif;
    margin: 0;
    padding: 0;
}

/* ================= HERO ================= */
.hero-carousel {
    height: 100vh;
    overflow: hidden;
}

.hero-carousel img {
    height: 100vh;
    object-fit: cover;
    filter: brightness(55%) contrast(105%);
}

/* HERO TEXT */
.carousel-caption {
    bottom: 30%;
    text-align: left;
    max-width: 650px;
}

/* TITRE */
.hero-title {
    font-size: 3rem;
    font-weight: 800;
    padding-bottom: 130px;
    color: #ffffff;
}
.hero-title2{
    font-size: 3rem;
    font-weight: 800;
    padding-bottom: 230px;
    color: #FFA500; 
}

/* SOUS TITRE */
.hero-sub {
    font-size: 1.2rem;
    opacity: 0.9;
    color: #ffffff;
}

/* BOUTON HERO */
.btn-hero {
    margin-top: 20px;
    background: #38bdf8;
    border: none;
    padding: 12px 28px;
    border-radius: 14px;
    color: #ffffff;
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-hero:hover {
    transform: translateY(-3px);
    background: #0ea5e9;
}

/* ================= SECTIONS ================= */
.section {
    padding: 90px 20px;
    background: #ffffff;
}

.section-dark {
    background: #f8fafc;
}

.section-title {
    text-align: center;
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 40px;
    color: #0f172a;
}

/* ================= SERVICES ================= */
.service-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 25px;
    text-align: center;
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(56,189,248,0.15);
}

/* ================= EDUCATION ================= */
.edu-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    border-left: 5px solid #38bdf8;
    transition: all 0.3s ease;
    margin-bottom: 15px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.edu-card:hover {
    transform: translateX(6px);
}

/* RESPONSIVE */
@media (max-width:768px){
    .hero-title {font-size: 2rem;}
    .carousel-caption {bottom: 20%;}
}

</style>

<!-- ================= HERO ================= -->
<div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">

  <div class="carousel-inner">

    <!-- SLIDE 1 -->
    <div class="carousel-item active">
      <img src="assets/images/dady16.jpg" class="d-block w-100">

      <div class="carousel-caption">
        <h1 class="hero-title">Développeur Web Professionnel et les bases de données</h1>
        <p class="hero-sub">PHP • JavaScript • MySQL • API REST</p>
        <a href="index.php?page=contact" class="btn btn-hero">Me contacter</a>
      </div>
    </div>

    <!-- SLIDE 2 -->
    <div class="carousel-item">
      <img src="assets/images/dady22.jpg" class="d-block w-100">

      <div class="carousel-caption">
        <h1 class="hero-title2">Secrétaire chez HERBY PULSE</h1> 
       
        <a href="index.php?page=about" class="btn btn-hero">Découvrir</a>
      </div>
    </div>

  </div>

</div>

<!-- ================= SERVICES ================= -->
<div class="section">

<h2 class="section-title">🧩 Nos Services</h2>

<div class="container">
<div class="row g-4">

  <div class="col-md-4">
    <div class="service-card">
      <h4>💻 Développement Web</h4>
      <p>Sites modernes, rapides et sécurisés avec PHP & JavaScript.</p>
    </div>
  </div>

  <div class="col-md-4">
    <div class="service-card">
      <h4>⚙ API & Backend</h4>
      <p>Création d’API REST et systèmes backend performants.</p>
    </div>
  </div>

  <div class="col-md-4">
    <div class="service-card">
      <h4>🎨 UI/UX Design</h4>
      <p>Interfaces modernes et expérience utilisateur optimisée.</p>
    </div>
  </div>

</div>
</div>

</div>

<!-- ================= EDUCATION ================= -->
<div class="section section-dark">

<h2 class="section-title">🎓 Éducation Technologique</h2>

<div class="container">

<div class="edu-card">
    <h5>💡 Développement Web</h5>
    <p>HTML, CSS, JavaScript, Bootstrap, PHP POO</p>
</div>

<div class="edu-card">
    <h5>🗄 Bases de données</h5>
    <p>MySQL, Oracle, conception de bases relationnelles</p>
</div>

<div class="edu-card">
    <h5>🌐 Réseaux & API</h5>
    <p>REST API, HTTP, intégration système</p>
</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>