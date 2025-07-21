<?php

class InicioController
{
    public function index()
    {
        // Cargar la vista parcial y almacenarla en $contenido
        ob_start();
        include VIEW_PATH . '/inicio/index.php';
        $contenido = ob_get_clean();

        // Incluir el layout base
        include LAYOUT_PATH . '/layout.php';
    }
}
