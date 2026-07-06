<div class="row justify-content-center">
    <div class="col-12 col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white fw-bold">Nueva pelicula</div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                <form method="POST" action="index.php?accion=crear">
                    <div class="mb-3">
                        <label class="form-label">Titulo *</label>
                        <input type="text" class="form-control" name="titulo" required
                               value="<?= htmlspecialchars($valores['titulo'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Director *</label>
                        <input type="text" class="form-control" name="director" required
                               value="<?= htmlspecialchars($valores['director'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Anio *</label>
                        <input type="number" class="form-control" name="anio" required
                               min="1901" max="2155"
                               value="<?= htmlspecialchars($valores['anio'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero *</label>
                        <input type="text" class="form-control" name="genero" required
                               value="<?= htmlspecialchars($valores['genero'] ?? '') ?>">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Duracion (min) *</label>
                        <input type="number" class="form-control" name="duracion" required min="1"
                               value="<?= htmlspecialchars($valores['duracion'] ?? '') ?>">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
