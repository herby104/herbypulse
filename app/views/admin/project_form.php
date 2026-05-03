<div class="card shadow-sm border-0 p-4 mb-4">

    <!-- TITRE -->
    <div class="mb-3">
        <h4 class="fw-bold">
            <?= isset($project) ? "✏️ Modifier le projet" : "➕ Ajouter un projet" ?>
        </h4>
        <p class="text-muted mb-0">
            Remplis les informations du projet portfolio
        </p>
    </div>

    <!-- FORM -->
    <form method="POST"
          action="index.php?page=<?= isset($project) ? "admin_update&id=".$project['id'] : "admin_add" ?>"
          enctype="multipart/form-data">

        <!-- TITRE -->
        <div class="mb-3">
            <label class="form-label">Titre du projet</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="<?= htmlspecialchars($project['title'] ?? '') ?>"
                   placeholder="Ex: Application de gestion clients"
                   required>
        </div>

        <!-- DESCRIPTION -->
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="4"
                      placeholder="Décris ton projet..."><?= htmlspecialchars($project['description'] ?? '') ?></textarea>
        </div>

        <!-- IMAGE -->
        <?php if (!isset($project)): ?>
            <div class="mb-3">
                <label class="form-label">Image du projet</label>
                <input type="file" name="image" class="form-control" required>
            </div>
        <?php else: ?>
            <div class="mb-3">
                <label class="form-label">Image actuelle</label><br>
                <?php if (!empty($project['image'])): ?>
                    <img src="assets/uploads/<?= $project['image'] ?>"
                         style="width:120px; border-radius:10px;">
                <?php else: ?>
                    <span class="text-muted">Aucune image</span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- LINK -->
        <div class="mb-3">
            <label class="form-label">Lien du projet</label>
            <input type="text"
                   name="link"
                   class="form-control"
                   value="<?= htmlspecialchars($project['link'] ?? '') ?>"
                   placeholder="https://...">
        </div>

        <!-- BUTTON -->
        <button class="btn btn-primary w-100 fw-bold">
            <?= isset($project) ? "💾 Mettre à jour" : "➕ Ajouter le projet" ?>
        </button>

    </form>

</div>