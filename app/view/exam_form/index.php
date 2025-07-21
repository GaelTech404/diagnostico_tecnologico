<?php $titulo = "Formulario de examen"; ?>
<?php include LAYOUT_PATH . '/header.php'; ?>

<div class="app-layout">

    <!-- Contenido principal -->
    <main class="main-content">

        <div class="container">
            <h3><?= htmlspecialchars($subtitulo ?? '') ?></h3>
            <h2>Pregunta <?= htmlspecialchars($currentIndex + 1) ?> de <?= count($questions) ?></h2>

            <!-- Barra de progreso accesible -->
            <div class="progress-bar" role="progressbar" aria-valuenow="<?= htmlspecialchars($progress) ?>"
                aria-valuemin="0" aria-valuemax="100">
                <div class="progress" style="width: <?= htmlspecialchars($progress) ?>%;"></div>
            </div>

            <form method="post" class="exam-form-question">

                <label class="pregunta"><?= htmlspecialchars($currentQuestion ?? '') ?></label>

                <div class="options">
                    <label for="opt1"><input id="opt1" type="radio" name="answer" value="1" required> Nunca (1)</label>
                    <label for="opt2"><input id="opt2" type="radio" name="answer" value="2"> Rara vez (2)</label>
                    <label for="opt3"><input id="opt3" type="radio" name="answer" value="3"> A veces (3)</label>
                    <label for="opt4"><input id="opt4" type="radio" name="answer" value="4"> Frecuentemente (4)</label>
                    <label for="opt5"><input id="opt5" type="radio" name="answer" value="5"> Siempre (5)</label>
                </div>

                <!-- Protección CSRF -->
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

                <div class="button-group">
                    <button type="submit" class="btn">Siguiente <i class="bi bi-arrow-right-circle"></i> </button>

                </div>
            </form>
        </div>
    </main>


</div>