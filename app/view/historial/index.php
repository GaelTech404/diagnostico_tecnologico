<?php $titulo = "Historial de Evaluaciones"; ?>
<?php include LAYOUT_PATH . '/header.php'; ?>

<div class="app-layout">

    <!-- Contenido principal -->
    <main class="main-content">
        <h2 class="main-title"><i class="bi bi-journal"></i> Historial de Evaluaciones</h2>

        <?php if (empty($historial)): ?>
            <p class="alert alert-info">No hay registros aún.</p>
        <?php else: ?>
            <?php foreach ($historial as $fila): ?>
                <div class="historial-card">
                    <div class="card-header">
                        <i class="bi bi-clock-history"></i> <strong>Fecha:</strong> <?= htmlspecialchars($fila['fecha']) ?>
                    </div>
                    <div class="card-body">
                        <p><strong>Promedio:</strong>
                            <span class="badge badge-promedio"><?= htmlspecialchars($fila['promedio']) ?></span>
                        </p>
                        <p><strong>Total:</strong> <?= htmlspecialchars($fila['total']) ?></p>
                        <p><strong>Nivel:</strong>
                            <span class="badge badge-nivel"><?= htmlspecialchars($fila['nivel']) ?></span>
                        </p>
                    </div>
                    <div class="card-recomendacion">
                        <details>
                            <summary><i class="bi bi-eye"></i> Ver Recomendación IA</summary>
                            <p><?= nl2br(htmlspecialchars($fila['recomendacion_ia'])) ?></p>
                        </details>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


    </main>

</div>