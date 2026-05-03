<style>

/* ================= DASHBOARD ================= */

.dashboard-title{
    font-size:30px;
    font-weight:900;
    color:#0f172a;
}

.dashboard-subtitle{
    color:#64748b;
    margin-bottom:20px;
}

/* STATS */
.stat-card{
    border:none;
    border-radius:22px;
    padding:24px;
    color:white;
    transition:0.3s;
    box-shadow:0 15px 35px rgba(0,0,0,0.08);
}

.stat-card:hover{
    transform:translateY(-8px);
}

.stat-icon{
    font-size:34px;
}

.stat-value{
    font-size:34px;
    font-weight:900;
}

/* COLORS */
.bg-projects{background:linear-gradient(135deg,#2563eb,#1e40af);}
.bg-clients{background:linear-gradient(135deg,#10b981,#047857);}
.bg-devis{background:linear-gradient(135deg,#f59e0b,#b45309);}

/* PANELS */
.panel-box{
    background:white;
    border-radius:22px;
    padding:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.06);
}

.btn-saas{
    border-radius:14px;
    padding:10px 16px;
    font-weight:600;
    transition:0.3s;
}

.btn-saas:hover{
    transform:scale(1.05);
}

</style>

<h2 class="dashboard-title">⚙ Dashboard Admin</h2>
<p class="dashboard-subtitle">Gestion Herby PULSE</p>

<!-- STATS -->
<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="stat-card bg-projects">
            📁
            <div class="stat-value"><?= $stats['total_projects'] ?? 0 ?></div>
            <div>Projets</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card bg-clients">
            👥
            <div class="stat-value"><?= $stats['total_clients'] ?? 0 ?></div>
            <div>Clients</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card bg-devis">
            📩
            <div class="stat-value"><?= $stats['total_devis'] ?? 0 ?></div>
            <div>Devis</div>
        </div>
    </div>

</div>

<!-- CONTENT -->
<div class="row g-4">

    <div class="col-lg-6">
        <div class="panel-box">
            <?php include __DIR__ . "/projects_list.php"; ?>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel-box">
            <?php include __DIR__ . "/clients_table.php"; ?>
        </div>
    </div>

</div>