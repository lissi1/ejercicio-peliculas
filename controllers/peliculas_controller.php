<?php
require_once __DIR__ . '/../models/Pelicula.php';

function accion_listar(Pelicula $modelo): void {
    $peliculas    = $modelo->todos();
    $tituloPagina = 'Catalogo de peliculas';

    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/peliculas/lista.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

function accion_nueva(): void {
    $tituloPagina = 'Nueva pelicula';

    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/peliculas/nueva.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

function accion_crear(Pelicula $modelo): void {
    $titulo   = trim($_POST['titulo']   ?? '');
    $director = trim($_POST['director'] ?? '');
    $anio     = (int)($_POST['anio']    ?? 0);
    $genero   = trim($_POST['genero']   ?? '');
    $duracion = (int)($_POST['duracion'] ?? 0);

    if ($titulo === '' || $director === '' || $genero === '' || $anio <= 0 || $duracion <= 0) {
        $error        = 'Rellena todos los campos correctamente.';
        $valores      = compact('titulo', 'director', 'anio', 'genero', 'duracion');
        $tituloPagina = 'Nueva pelicula';

        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/peliculas/nueva.php';
        require __DIR__ . '/../views/layouts/footer.php';
        return;
    }

    $modelo->crear($titulo, $director, $anio, $genero, $duracion);
    header('Location: index.php');
    exit;
}

function accion_editar(Pelicula $modelo): void {
    $id       = (int)($_GET['id'] ?? -1);
    $pelicula = $modelo->porId($id);

    if (!$pelicula) {
        header('Location: index.php');
        exit;
    }

    $tituloPagina = 'Editar pelicula';

    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/peliculas/editar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

function accion_actualizar(Pelicula $modelo): void {
    $id       = (int)($_POST['id'] ?? -1);
    $titulo   = trim($_POST['titulo']   ?? '');
    $director = trim($_POST['director'] ?? '');
    $anio     = (int)($_POST['anio']    ?? 0);
    $genero   = trim($_POST['genero']   ?? '');
    $duracion = (int)($_POST['duracion'] ?? 0);

    if (!$modelo->porId($id)) {
        header('Location: index.php');
        exit;
    }

    if ($titulo === '' || $director === '' || $genero === '' || $anio <= 0 || $duracion <= 0) {
        $error        = 'Rellena todos los campos correctamente.';
        $pelicula     = compact('id', 'titulo', 'director', 'anio', 'genero', 'duracion');
        $tituloPagina = 'Editar pelicula';

        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/peliculas/editar.php';
        require __DIR__ . '/../views/layouts/footer.php';
        return;
    }

    $modelo->actualizar($id, $titulo, $director, $anio, $genero, $duracion);
    header('Location: index.php');
    exit;
}

function accion_confirmar_eliminar(Pelicula $modelo): void {
    $id       = (int)($_GET['id'] ?? -1);
    $pelicula = $modelo->porId($id);

    if (!$pelicula) {
        header('Location: index.php');
        exit;
    }

    $tituloPagina = 'Eliminar pelicula';

    require __DIR__ . '/../views/layouts/header.php';
    require __DIR__ . '/../views/peliculas/confirmar_eliminar.php';
    require __DIR__ . '/../views/layouts/footer.php';
}

function accion_eliminar(Pelicula $modelo): void {
    $id = (int)($_POST['id'] ?? -1);
    $modelo->eliminar($id);

    header('Location: index.php');
    exit;
}
