<?php
// Cargar configuración general
require_once __DIR__ . '/../app/autoload.php'; // ✅ correcto

// Autocargar clases de controladores y modelos
spl_autoload_register(function ($clase) {
    $rutaController = __DIR__ . '/../app/controller/' . $clase . '.php';
    $rutaModel = __DIR__ . '/../app/model/' . $clase . '.php';

    if (file_exists($rutaController)) {
        require_once $rutaController;
    } elseif (file_exists($rutaModel)) {
        require_once $rutaModel;
    }
});

// Conexión a la base de datos
require_once __DIR__ . '/../app/conexion.php';

// Lista de controladores válidos
$controladoresDisponibles = [
    'exam_form' => 'ExamFormController',
    'historial' => 'HistorialController',
    'exam_results' => 'Exam_ResultsController',
    'recomendaciones' => 'RecomendacionesController',
    'inicio' => 'InicioController',
    'asesor' => 'AsesorController'
];


// Determinar controlador solicitado
$nombreControlador = $_GET['controlador'] ?? 'inicio';

if (!array_key_exists($nombreControlador, $controladoresDisponibles)) {
    http_response_code(404);
    echo "Error 404: Controlador no encontrado.";
    exit;
}

// Instanciar y ejecutar controlador
$claseControlador = $controladoresDisponibles[$nombreControlador];

// Algunos controladores pueden necesitar la conexión ($conexion)
if (in_array($nombreControlador, ['historial', 'exam_results', 'recomendaciones', 'asesor'])) {
    $controller = new $claseControlador($conexion);
} else {
    $controller = new $claseControlador();
}

// Ejecutar método principal
$metodo = match ($nombreControlador) {
    'exam_form' => 'mostrarFormulario',
    'historial' => 'index',
    'exam_results' => 'procesarResultado',
    'recomendaciones' => 'index',
    'inicio' => 'index',
    'asesor' => 'index'
};


$controller->$metodo();
