<?php $titulo = "Resultados del Examen"; ?>

<?php include LAYOUT_PATH . '/header.php'; ?>

<div class="container">
    <div class="exam-result-card">
        <h2 class="main-title"><i class="bi bi-card-checklist"></i> Resultados del Examen</h2>

        <div class="result-stats">
            <p><strong><i class="bi bi-reception-4"></i> Nivel de Madurez Tecnológica:</strong>
                <span class="badge badge-nivel"><?= htmlspecialchars($nivel) ?></span>
            </p>
            <p><strong><i class="bi bi-star"></i> Puntaje Total:</strong>
                <span class="badge badge-total"><?= htmlspecialchars($total) ?></span>
            </p>
            <p><strong><i class="bi bi-bar-chart-line-fill"></i> Promedio:</strong>
                <span class="badge badge-promedio"><?= number_format($promedio, 2) ?></span>
            </p>
        </div>

        <div class="rec-box">
            <h4><i class="bi bi-robot"></i> Recomendación de la IA:</h4>
            <blockquote><?= nl2br(htmlspecialchars($recomendacionIA)) ?></blockquote>
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-success" onclick="window.location.href='index.php?controlador=inicio'">
                <i class="bi bi-house-gear"></i> Regresar al inicio
            </button>
        </div>
    </div>
</div>

<?php include LAYOUT_PATH . '/footer.php'; ?>