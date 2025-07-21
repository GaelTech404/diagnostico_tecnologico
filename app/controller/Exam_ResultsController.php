<?php

require_once __DIR__ . '/../model/HistorialModel.php';
require_once __DIR__ . '/../ia/IAHelper.php';

class Exam_ResultsController
{
    private HistorialModel $historialModel;

    public function __construct($conexion)
    {
        $this->historialModel = new HistorialModel($conexion);
        session_start();
    }

    public function procesarResultado(): void
    {
        if (!$this->respuestasValidas()) {
            echo "No hay respuestas registradas. Por favor, realiza el examen primero.";
            exit;
        }

        $respuestas = $_SESSION['answers'];
        $total = array_sum($respuestas);
        $numero = count($respuestas);
        $promedio = $total / $numero;

        $nivel = $this->determinarNivel($promedio);
        require_once __DIR__ . '/../ia/IAHelper.php';
        $ia = new IAHelper();
        $recomendacionIA = $ia->obtenerRecomendacion($promedio);

        $this->historialModel->guardarResultado($promedio, $total, $nivel, $recomendacionIA);

        // Limpiar sesión parcial
        unset($_SESSION['answers'], $_SESSION['current_question']);

        // Mostrar vista
        $this->renderVista($promedio, $total, $nivel, $recomendacionIA);
    }

    private function respuestasValidas(): bool
    {
        return isset($_SESSION['answers']) &&
            is_array($_SESSION['answers']) &&
            !empty($_SESSION['answers']);
    }

    private function determinarNivel(float $prom): string
    {
        return match (true) {
            $prom <= 2 => "Bajo",
            $prom <= 3.5 => "Medio",
            default => "Alto"
        };
    }

    private function renderVista(float $promedio, int $total, string $nivel, string $recomendacionIA): void
    {
        // Variables disponibles en la vista
        $titulo = "Resultado del Examen";
        ob_start();
        include VIEW_PATH . '/exam_results/index.php';
        $contenido = ob_get_clean();

        echo $contenido;

    }
}
