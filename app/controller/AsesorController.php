<?php
require_once __DIR__ . '/../ia/IAHelper.php';

class AsesorController
{
    private $modelo;

    public function __construct($conexion)
    {
        $this->modelo = new HistorialModel($conexion);
    }

    public function index()
    {
        $ultimo = $this->modelo->obtenerUltimoResultado();

        if (!$ultimo) {
            $mensaje = "⚠️ No hay resultados aún. Realiza primero un examen.";
            ob_start();
            include VIEW_PATH . '/asesor/sin_resultado.php';
            $contenido = ob_get_clean();
            include LAYOUT_PATH . '/layout.php';
            return;
        }

        $nivel = $ultimo['nivel'];
        $recomendacion = $ultimo['recomendacion_ia'];
        $respuestaIA = '';
        $mensajeUsuario = '';

        $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['pregunta'])) {
            $pregunta = trim(filter_input(INPUT_POST, 'pregunta', FILTER_SANITIZE_STRING));
            $mensajeUsuario = $pregunta;

            try {
                $prompt = <<<EOT
Eres un asesor virtual de transformación digital. El usuario tiene el siguiente diagnóstico:

Nivel de madurez: $nivel  
Recomendación general: $recomendacion  

Pregunta del usuario: "$pregunta"

Responde de manera breve y clara, directa y personalizada según los datos anteriores.
EOT;

                $respuestaIA = IAHelper::consultarIA($prompt);
            } catch (Exception $e) {
                $respuestaIA = "⚠️ Error al contactar la IA: " . $e->getMessage();
            }

            if ($isAjax) {
                echo '<div class="chat-message user"><strong>Tú:</strong> ' . htmlspecialchars($mensajeUsuario) . '</div>';
                echo '<div class="chat-message bot"><strong>Asesor:</strong> ' . htmlspecialchars($respuestaIA) . '</div>';
                exit;
            }
        }

        // Vista normal con layout
        ob_start();
        include VIEW_PATH . '/asesor/index.php';
        $contenido = ob_get_clean();
        include LAYOUT_PATH . '/layout.php';
    }
}
