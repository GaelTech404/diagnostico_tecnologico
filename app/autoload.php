<?php
// Carga las constantes globales de configuración (rutas, URL_BASE, etc.)
require_once __DIR__ . '/config/config.php';

// Autocarga de clases personalizada (controladores, modelos, helpers)
spl_autoload_register(function ($clase) {
    $rutas = [
        MODEL_PATH . "/{$clase}.php",
        CONTROLLER_PATH . "/{$clase}.php",
        APP_PATH . "/helpers/{$clase}.php",
        APP_PATH . "/ia/{$clase}.php", // soporte para IAHelper, etc.
    ];

    foreach ($rutas as $ruta) {
        if (file_exists($ruta)) {
            require_once $ruta;
            return;
        }
    }

    exit;
});
