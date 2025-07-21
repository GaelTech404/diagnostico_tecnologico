<?php
$tema = $_COOKIE['tema'] ?? 'light';
$titulo = $titulo ?? 'Diagnóstico de Madurez Tecnológica';
?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="<?= htmlspecialchars($tema) ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?></title>

    <link rel="stylesheet" href="<?= ASSETS_URL ?>css/main.css">

    <!-- Estilos base y Bootstrap -->
    <link rel="stylesheet" href="<?= ASSETS_URL ?>librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= ASSETS_URL ?>librerias/bootstrap/css/bootstrap-icons.css">

    <script src="<?= ASSETS_URL ?>js/main.js"></script>
    <script src="<?= ASSETS_URL ?>librerias/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

