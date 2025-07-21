<div id="chat-flotante" class="chat-flotante oculto">
    <div class="chat-header">
     <i class="bi bi-robot"></i> Asesor Virtual
        <button class="cerrar-chat btn btn-sm btn-light" onclick="toggleChat()" aria-label="Cerrar">
            <i class="bi bi-x"></i>
        </button>
    </div>
    <div class="chat-body">
        <div id="chatBox" class="chat-box">
        </div>

        <form method="POST" onsubmit="enviarPregunta(event)">
            <input type="text" id="inputPregunta" placeholder="Ej: ¿Qué debo mejorar?" required>
            <button type="submit">Enviar</button>
        </form>

        <div class="preguntas-rapidas">
            <button onclick="setPregunta('¿Qué debo mejorar?')">¿Qué debo mejorar?</button>
            <button onclick="setPregunta('¿Cuál es mi nivel?')">¿Cuál es mi nivel?</button>
            <button onclick="setPregunta('¿Qué sigue ahora?')">¿Qué sigue ahora?</button>
        </div>
    </div>
</div>