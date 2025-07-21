<?php
require_once __DIR__ . '/../model/HistorialModel.php';

class HistorialController
{
    private HistorialModel $modelo;

    public function __construct($conexion)
    {
        $this->modelo = new HistorialModel($conexion);
    }

    public function index(): void
    {
        try {
            $historial = $this->modelo->obtenerHistorial();
        } catch (Exception $e) {
            $historial = [];
        }

        ob_start();
        include VIEW_PATH . '/historial/index.php';
        $contenido = ob_get_clean();

        include LAYOUT_PATH . '/layout.php';
    }
}
