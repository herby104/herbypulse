<h4>📁 Liste des projets</h4>

<div class="row">

<?php foreach($projects as $p): ?>

<div class="col-md-4">
<div class="card p-2 mb-3">

<img src="assets/uploads/<?= $p['image'] ?>" class="img-fluid">

<h5><?= $p['title'] ?></h5>
<p><?= $p['description'] ?></p>

<div class="d-flex justify-content-between">

<a href="<?= $p['link'] ?>" class="btn btn-primary btn-sm">Voir</a>

<a href="index.php?page=admin_edit&id=<?= $p['id'] ?>"
   class="btn btn-warning btn-sm">Modifier</a>

<a href="index.php?page=admin_delete&id=<?= $p['id'] ?>"
   class="btn btn-danger btn-sm">Supprimer</a>

</div>

</div>
</div>

<?php endforeach; ?>

</div>