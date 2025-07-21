<?php
require_once __DIR__ . '/../model/HistorialModel.php';

class RecomendacionesController
{
    private HistorialModel $modelo;

    public function __construct($conexion)
    {
        $this->modelo = new HistorialModel($conexion);
    }

    public function index(): void
    {
        $ultimo = $this->modelo->obtenerUltimoResultado();

        if (!$ultimo) {
            $mensaje = "⚠️ No se encontró ningún resultado. Por favor, realiza primero un examen.";
            include VIEW_PATH . '/recomendaciones/sin_resultado.php';
            return;
        }

        $data = [
            'promedio' => $ultimo['promedio'],
            'total' => $ultimo['total'],
            'nivel' => $ultimo['nivel'],
            'recomendacionIA' => $ultimo['recomendacion_ia']
        ];

        extract($data);
        ob_start();
        include VIEW_PATH . '/recomendaciones/index.php';
        $contenido = ob_get_clean();

        include LAYOUT_PATH . '/layout.php';
    }
}
