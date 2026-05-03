<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">

<h2>📩 Demande de devis</h2>

<form action="index.php?page=add_client" method="POST" class="card p-4 shadow">

    <input type="text" name="nom" class="form-control mb-2" placeholder="Nom" required>

    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

    <input type="text" name="telephone" class="form-control mb-2" placeholder="Téléphone">

    <select name="service" class="form-control mb-2">
        <option>Site Web</option>
        <option>API REST</option>
        <option>Application Web</option>
        <option>Base de données</option>
    </select>

    <textarea name="message" class="form-control mb-2" placeholder="Décris ton projet"></textarea>

    <button class="btn btn-primary w-100">📨 Envoyer devis</button>

</form>

</div>