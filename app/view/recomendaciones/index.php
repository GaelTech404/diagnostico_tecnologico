<?php $titulo = "Recomendaciones"; ?>
<?php include LAYOUT_PATH . '/header.php'; ?>

<div class="app-layout">

    <!-- Contenido principal -->
    <main class="main-content">
        <h2 class="main-title"> <i class="bi bi-megaphone"></i> Recomendaciones</h2>

        <div class="recommendation-card">

            <div class="rec-stats">
                <p><strong><i class="bi bi-reception-4"></i> Nivel:</strong> <span
                        class="badge badge-nivel"><?= htmlspecialchars($nivel) ?></span></p>
                <p><strong><i class="bi bi-clipboard2-data"></i> Promedio:</strong>
                    <span class="badge badge-promedio"><?= number_format($promedio, 2) ?></span>
                </p>
                <p><strong><i class="bi bi-pen"></i> Puntaje Total:</strong>
                    <span class="badge badge-total"><?= htmlspecialchars($total) ?></span>
                </p>
            </div>

            <div class="rec-box">
                <h4><i class="bi bi-robot"></i> Recomendación IA:</h4>
                <blockquote><?= nl2br(htmlspecialchars($recomendacionIA)) ?></blockquote>
            </div>

        </div>
    </main>


</div>