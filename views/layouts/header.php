<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tituloPagina ?? 'Videoclub') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Videoclub</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php?accion=listar">Catálogo</a>
                <a class="nav-link" href="index.php?accion=nueva">Agregar película</a>
            </div>
        </div>
    </nav>
    <div class="container mb-5">
