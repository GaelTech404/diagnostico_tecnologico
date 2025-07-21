<aside class="sidebar" id="sidebar">
    <img class="logo-tema img-fluid w-100" alt="">


    <h2 class="sidebar-title"> Menu</h2>


    <nav class="sidebar-nav">
        <ul>
            <li class="nav-item">
                <a href="index.php?controlador=inicio" data-bs-toggle="tooltip" data-bs-placement="right"
                    class="nav-link-custom" title="Inicio">
                    <i class="bi bi-house-gear-fill"></i> <span class="texto-modulo">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?controlador=exam_form" data-bs-toggle="tooltip" data-bs-placement="right"
                    class="nav-link-custom" title="Nuevo Examen">
                    <i class="bi bi-clipboard2-check"></i> <span class="texto-modulo">Nuevo Examen</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?controlador=historial" data-bs-toggle="tooltip" data-bs-placement="right"
                    class="nav-link-custom" title="Historial">
                    <i class="bi bi-clock-history"></i> <span class="texto-modulo">Historial</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?controlador=recomendaciones" data-bs-toggle="tooltip" data-bs-placement="right"
                    class="nav-link-custom" title="Recomendaciones">
                    <i class="bi bi-megaphone"></i> <span class="texto-modulo">Recomendaciones</span>
                </a>
            </li>
        </ul>
    </nav>


    <div class="sidebar-footer">
        <button class="boton-chat" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Asesor Virtual" onclick="toggleChat(); this.blur();">
            <i class="bi bi-robot"></i>
        </button>

        <button class="btn-tema-toggle" type="button" data-bs-toggle="tooltip" data-bs-placement="left"
            title="Tema Oscuro/Claro" onclick="alternarTema(); this.blur();">
            <i id="icono-tema" class="bi bi-moon-fill"></i>
        </button>
    </div>

</aside>