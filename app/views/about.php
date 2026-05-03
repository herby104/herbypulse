<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

/* ===== GLOBAL ===== */
body{
    background:#ffffff;
    font-family:"Segoe UI",sans-serif;
    color:#0f172a;
    user-select:none; /* empêche sélection (option sécurité UI) */
}

/* ===== HERO ABOUT ===== */
.about-hero{
    padding:80px 20px;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:50px;
    flex-wrap:wrap;
}

/* PHOTO PROFIL */
.profile-img{
    width:220px;
    height:220px;
    border-radius:50%;
    object-fit:cover;
    border:6px solid #38bdf8;
    box-shadow:0 10px 30px rgba(0,0,0,0.15);
    animation:float 4s ease-in-out infinite;
}

@keyframes float{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
}

/* TEXT */
.about-text{
    max-width:600px;
}

.about-text h1{
    font-size:2.5rem;
    font-weight:800;
}

.about-text p{
    font-size:1.1rem;
    opacity:0.85;
}

/* BUTTON SIMPLE (sans export) */
.btn-primary-soft{
    background:#38bdf8;
    color:white;
    padding:10px 20px;
    border-radius:12px;
    border:none;
    font-weight:600;
    margin-top:15px;
    transition:0.3s;
    display:inline-block;
    text-decoration:none;
}

.btn-primary-soft:hover{
    background:#0ea5e9;
    transform:translateY(-3px);
}

/* ===== TIMELINE ===== */
.timeline{
    position:relative;
    margin:60px auto;
    max-width:800px;
}

.timeline::before{
    content:"";
    position:absolute;
    left:50%;
    width:2px;
    height:100%;
    background:#e5e7eb;
}

.timeline-item{
    display:flex;
    justify-content:space-between;
    padding:20px 0;
    position:relative;
}

.timeline-item div{
    width:45%;
    background:#f8fafc;
    padding:15px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

.timeline-item:nth-child(even){
    flex-direction:row-reverse;
}

.timeline-dot{
    width:12px;
    height:12px;
    background:#38bdf8;
    border-radius:50%;
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    top:25px;
}

/* ===== STORY ===== */
.story{
    max-width:900px;
    margin:80px auto;
    text-align:center;
}

.story h2{
    font-weight:800;
    margin-bottom:20px;
}

/* RESPONSIVE */
@media(max-width:768px){
    .about-hero{
        flex-direction:column;
        text-align:center;
    }

    .timeline::before{
        left:10px;
    }

    .timeline-item{
        flex-direction:column !important;
    }

    .timeline-item div{
        width:100%;
        margin-left:30px;
    }

    .timeline-dot{
        left:10px;
    }
}

</style>

<!-- ================= HERO ABOUT ================= -->
<div class="about-hero">

    <img src="assets/images/profile.jpg" class="profile-img">

    <div class="about-text">
        <h1>À propos de moi</h1>

        <p>
            Développeur web passionné, spécialisé en création d’applications modernes,
            API REST et solutions digitales professionnelles.
        </p>

        <p>
            Je transforme des idées en produits web performants et scalables.
            Mon objectif est de travailler en freelance ou à l’international.
        </p>

        <!-- ❌ EXPORT PDF SUPPRIMÉ -->
        <!-- remplacé par action simple -->
        <a href="index.php?page=cv" class="btn-primary-soft">
            📄 Voir mon CV
        </a>
    </div>

</div>

<!-- ================= STORY ================= -->
<div class="story">
    <h2>💡 Mon parcours</h2>
    <p>
        Tout a commencé avec la curiosité du web. Aujourd’hui je développe des systèmes
        complets allant du frontend moderne jusqu’aux API et bases de données.
    </p>
</div>

<!-- ================= TIMELINE ================= -->
<div class="timeline">

    <div class="timeline-item">
        <div>
            <h5>🎓 Formation</h5>
            <p>Études en sciences informatiques et développement web.</p>
        </div>
        <span class="timeline-dot"></span>
        <div></div>
    </div>

    <div class="timeline-item">
        <div></div>
        <span class="timeline-dot"></span>
        <div>
            <h5>💻 Stage AGD</h5>
            <p>Développement API, base de données et systèmes web.</p>
        </div>
    </div>

    <div class="timeline-item">
        <div>
            <h5>🚀 Aujourd’hui</h5>
            <p>Création de projets full-stack et portfolio professionnel.</p>
        </div>
        <span class="timeline-dot"></span>
        <div></div>
    </div>

</div>