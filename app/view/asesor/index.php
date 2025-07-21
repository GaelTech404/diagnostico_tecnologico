<?php $titulo = "Asesor Virtual"; ?>

<?php include LAYOUT_PATH . '/header.php'; ?>

<div class="container">
    <h2 class="main-title">🧠 Asesor Virtual</h2>

    <div class="chat-box" id="chatBox">
        <?php if (!empty($mensajeUsuario)): ?>
            <div class="chat-message user"><strong>Tú:</strong> <?= htmlspecialchars($mensajeUsuario) ?></div>
            <div class="chat-message bot"><?= htmlspecialchars($respuestaIA) ?></div>
        <?php else: ?>
            <div class="chat-message bot">💬 Hola, soy tu asesor. Puedes preguntarme cómo mejorar según tu evaluación.</div>
        <?php endif; ?>
    </div>

    <form onsubmit="enviarPregunta(event)" class="form-ia">
        <label for="inputPregunta">Hazle una pregunta al asesor:</label>
        <input type="text" id="inputPregunta" name="pregunta" required placeholder="Ej: ¿Qué debo mejorar?">
        <button type="submit">Enviar</button>
    </form>

   
</div>

<div style="text-align: center; margin-top: 20px;">
    <button onclick="window.location.href='index.php?controlador=inicio'" class="btn-success">Volver al
        Inicio</button>
</div>
</div>