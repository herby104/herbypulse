<h5 class="mb-3 fw-bold">👥 Liste des clients</h5>

<div class="table-responsive">

<table class="table table-hover align-middle">

    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Service</th>
        </tr>
    </thead>

    <tbody>

    <?php if (!empty($clients)): ?>
        <?php foreach($clients as $c): ?>
            <tr>
                <td class="fw-semibold"><?= htmlspecialchars($c['nom']) ?></td>
                <td><?= htmlspecialchars($c['email']) ?></td>
                <td><?= htmlspecialchars($c['telephone']) ?></td>
                <td>
                    <span class="badge bg-primary">
                        <?= htmlspecialchars($c['service']) ?>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4" class="text-center text-muted p-4">
                Aucun client pour le moment
            </td>
        </tr>
    <?php endif; ?>

    </tbody>

</table>

</div>