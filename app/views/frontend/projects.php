<style>
/* ================= PROJECTS MODERN UI ================= */

.section-title {
    font-size: 32px;
    font-weight: 800;
    margin-bottom: 25px;
    color: #0f172a;
}

/* GRID CARD */
.project-card {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: 0.3s ease;
    height: 100%;
}

.project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

/* IMAGE */
.project-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* CONTENT */
.project-body {
    padding: 15px;
}

.project-title {
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 8px;
    color: #0f172a;
}

.project-desc {
    font-size: 14px;
    color: #64748b;
    min-height: 50px;
}

/* BUTTON */
.btn-project {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 14px;
    border-radius: 10px;
    background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    color: white;
    text-decoration: none;
    font-weight: 600;
    transition: 0.3s;
}

.btn-project:hover {
    transform: scale(1.05);
    color: white;
}
</style>

<div class="container py-4">

    <!-- TITLE -->
    <h2 class="section-title">💼 Mes Projets</h2>

    <!-- GRID -->
    <div class="row g-4">

        <?php if (!empty($projects)): ?>

            <?php foreach($projects as $p): ?>

                <div class="col-md-4">

                    <div class="project-card">

                        <!-- IMAGE -->
                        <img src="assets/uploads/<?= htmlspecialchars($p['image']) ?>" 
                             class="project-img">

                        <!-- BODY -->
                        <div class="project-body">

                            <div class="project-title">
                                <?= htmlspecialchars($p['title']) ?>
                            </div>

                            <div class="project-desc">
                                <?= htmlspecialchars($p['description']) ?>
                            </div>

                            <?php if (!empty($p['link'])): ?>
                                <a href="<?= htmlspecialchars($p['link']) ?>" 
                                   target="_blank"
                                   class="btn-project">
                                    🔗 Voir projet
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-12 text-center text-muted">
                Aucun projet disponible
            </div>

        <?php endif; ?>

    </div>

</div>