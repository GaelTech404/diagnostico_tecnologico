<?php
$tema = $_COOKIE['tema'] ?? 'light';
$titulo = $titulo ?? 'Diagnóstico de Madurez Tecnológica';
?>


<!DOCTYPE html>
<html lang="es" data-bs-theme="<?= htmlspecialchars($tema) ?>">
<?php include LAYOUT_PATH . '/header.php'; ?> <!-- Aquí va el head -->


<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-3 col-lg-2 p-0">
                <?php include VIEW_PATH . '/component/sidebar.php'; ?>
            </aside>

            <!-- Contenido principal -->
            <main class="col-md-9 col-lg-10 p-4">
                <?= $contenido ?? '<p>Error: No se encontró el contenido</p>' ?>
                <?php include LAYOUT_PATH . '/footer.php'; ?>

            </main>
        </div>

        <!-- Chat flotante -->
        <?php include VIEW_PATH . '/component/chat_flotante.php'; ?>

        <!-- Footer -->
    </div>
</body>

</html>