function setPregunta(texto) {
    const input = document.getElementById('pregunta') || document.getElementById('inputPregunta');
    if (input) {
        input.value = texto;
        input.focus();
    }
}
function enviarPregunta(e) {
    e.preventDefault();

    const input = document.getElementById('inputPregunta');
    const pregunta = input?.value.trim();
    if (!pregunta) return;

    fetch('index.php?controlador=asesor', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'  // <--- CLAVE
        },
        body: 'pregunta=' + encodeURIComponent(pregunta)
    })
        .then(res => res.text())
        .then(html => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML += html;
            input.value = '';
            chatBox.scrollTop = chatBox.scrollHeight;
        })
        .catch(() => {
            document.getElementById('chatBox').innerHTML += `
            <div class="chat-message bot">❌ Error al contactar al asesor.</div>
        `;
        });
}

// Almacena los mensajes mientras no se cierre el chat
var historialConversacion = [];

function toggleChat() {
    const chat = document.getElementById('chat-flotante');
    const estaOculto = chat.classList.toggle('oculto');

    if (estaOculto) {
        // ✅ Si se oculta, limpiamos el historial
        historialConversacion = [];
        document.getElementById('chatBox').innerHTML = '';
    } else {
        // 🔁 Si se abre de nuevo, restaurar historial
        restaurarConversacion();
    }
}




function restaurarConversacion() {
    const chatBox = document.getElementById('chatBox');
    chatBox.innerHTML = '';

    historialConversacion.forEach(msg => {
        const div = document.createElement('div');
        div.className = `chat-message ${msg.tipo}`;
        div.innerHTML = `<strong>${msg.tipo === 'user' ? 'Tú' : 'Asesor'}:</strong> ${msg.texto}`;
        chatBox.appendChild(div);
    });

    // Scroll al final
    chatBox.scrollTop = chatBox.scrollHeight;
}

function alternarTema() {
    const actual = document.documentElement.getAttribute("data-bs-theme") || "light";
    const nuevo = actual === "light" ? "dark" : "light";

    document.documentElement.setAttribute("data-bs-theme", nuevo);
    document.cookie = `tema=${nuevo}; path=/; max-age=31536000`;

    actualizarIconoTema(nuevo);
}

function actualizarIconoTema(tema) {
    const icono = document.getElementById("icono-tema");
    if (icono) {
        icono.className = tema === "dark" ? "bi bi-moon-stars-fill" : "bi bi-sun-fill";
    }
}

document.addEventListener('DOMContentLoaded', () => {
    // ✅ Inicializar ícono de tema según cookie
    const temaCookie = document.cookie
        .split('; ')
        .find(row => row.startsWith('tema='))
        ?.split('=')[1] || 'light';

    actualizarIconoTema(temaCookie);

    // ✅ Inicializar tooltips de Bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));
});
