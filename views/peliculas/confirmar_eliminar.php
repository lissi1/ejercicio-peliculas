<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card border-danger shadow-sm">
            <div class="card-header bg-danger text-white fw-bold">Confirmar eliminacion</div>
            <div class="card-body text-center py-4">
                <p class="fs-5 mb-1">¿Eliminar la pelicula?</p>
                <p class="fw-bold fs-4">"<?= htmlspecialchars($pelicula['titulo']) ?>"</p>
                <div class="alert alert-warning">
                    Esta accion <strong>no se puede deshacer</strong>.
                </div>
                <div class="d-flex gap-3 justify-content-center">
                    <form method="POST" action="index.php?accion=eliminar">
                        <input type="hidden" name="id" value="<?= $pelicula['id'] ?>">
                        <button type="submit" class="btn btn-danger px-4">Si, eliminar</button>
                    </form>
                    <a href="index.php" class="btn btn-outline-secondary px-4">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
