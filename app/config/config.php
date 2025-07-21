<?php

// Detecta protocolo (http o https)
$protocolo = (!empty($_SERVER['HTTPS']) || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'))
    ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$proyecto = '/dashboard/Madurez_Tecnologica';

define('URL_BASE', $protocolo . $host . $proyecto . '/');
define('ASSETS_URL', $protocolo . $host . $proyecto . '/public/assets/');

// ✅ Corrección aquí:
define('APP_PATH', realpath(__DIR__ . '/..')); // Subimos solo 1 nivel desde /config → /app

define('VIEW_PATH', APP_PATH . '/view');
define('LAYOUT_PATH', VIEW_PATH . '/layout');
define('CONTROLLER_PATH', APP_PATH . '/controller');
define('MODEL_PATH', APP_PATH . '/model');
