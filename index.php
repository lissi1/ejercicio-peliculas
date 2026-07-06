<?php
require_once 'config/Conexion.php';
require_once 'models/Pelicula.php';
require_once 'controllers/peliculas_controller.php';

$pdo    = Conexion::obtener();
$modelo = new Pelicula($pdo);

$acciones = [
    'listar'              => 'accion_listar',
    'nueva'                => 'accion_nueva',
    'crear'                => 'accion_crear',
    'editar'               => 'accion_editar',
    'actualizar'           => 'accion_actualizar',
    'confirmar_eliminar'   => 'accion_confirmar_eliminar',
    'eliminar'             => 'accion_eliminar',
];

$accion = $_GET['accion'] ?? 'listar';

if (isset($acciones[$accion])) {
    $fn = $acciones[$accion];
    $fn($modelo);
} else {
    accion_listar($modelo);
}
