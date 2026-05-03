<style>
/* ===== PAGE CLIENTS MODERNE ===== */

.page-header{
    background:white;
    padding:20px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
    margin-bottom:20px;
}

.page-title{
    font-size:26px;
    font-weight:900;
    color:#0f172a;
}

.page-subtitle{
    color:#64748b;
}

.panel-box{
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.06);
}

/* TABLE */
.table thead{
    background:#0a1f44;
    color:white;
}

.table tbody tr:hover{
    background:#f1f5f9;
    transition:0.2s;
}

/* BADGES */
.badge-service{
    background:#1d4ed8;
    color:white;
    padding:6px 10px;
    border-radius:12px;
    font-size:12px;
    font-weight:600;
}

/* BUTTON */
.btn-back{
    background:#0a1f44;
    color:white;
    padding:8px 14px;
    border-radius:12px;
    text-decoration:none;
}

.btn-back:hover{
    background:#1d4ed8;
    color:white;
}
</style>

<div class="page-header d-flex justify-content-between align-items-center flex-wrap gap-2">

    <div>
        <h2 class="page-title">👥 Gestion des Clients</h2>
        <p class="page-subtitle mb-0">
            Toutes les demandes reçues depuis ton portfolio
        </p>
    </div>
    <a href="index.php?page=export_clients" class="btn btn-success">
    📥 Export CSV
    </a>
    <a href="index.php?page=export_devis" class="btn btn-danger">
    📄 Export PDF
    </a>
    <a href="backup_db.php" class="btn btn-primary">Faire un backup</a>

    <a href="index.php?page=admin" class="btn-back">
        ← Retour Dashboard
    </a>

</div>

<div class="panel-box">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Service</th>
                    <th>Message</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach ($clients as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><strong><?= htmlspecialchars($c['nom']) ?></strong></td>
                    <td><?= htmlspecialchars($c['email']) ?></td>
                    <td><?= htmlspecialchars($c['telephone']) ?></td>
                    <td>
                        <span class="badge-service">
                            <?= htmlspecialchars($c['service']) ?>
                        </span>
                    </td>
                    <td><?= htmlspecialchars($c['message']) ?></td>
                </tr>
            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>