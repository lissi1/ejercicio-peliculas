<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-0">Catalogo de peliculas</h2>
    <a href="index.php?accion=nueva" class="btn btn-primary">+ Nueva pelicula</a>
</div>

<?php if (empty($peliculas)): ?>
    <div class="alert alert-info">Todavia no hay peliculas en el catalogo.</div>
<?php else: ?>
    <table class="table table-striped align-middle bg-white">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Director</th>
                <th>Anio</th>
                <th>Genero</th>
                <th>Duracion</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peliculas as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['titulo']) ?></td>
                    <td><?= htmlspecialchars($p['director']) ?></td>
                    <td><?= $p['anio'] ?></td>
                    <td><span class="badge bg-secondary"><?= htmlspecialchars($p['genero']) ?></span></td>
                    <td><?= $p['duracion'] ?> min</td>
                    <td class="text-end">
                        <a href="index.php?accion=editar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="index.php?accion=confirmar_eliminar&id=<?= $p['id'] ?>" class="btn btn-sm btn-outline-danger">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
