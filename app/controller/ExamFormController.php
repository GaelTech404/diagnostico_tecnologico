<?php
class ExamFormController
{
    private array $questions;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->questions = $this->cargarPreguntas();
    }


    public function mostrarFormulario()
    {
        $this->inicializarSesion();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->procesarRespuesta($_POST['answer'] ?? null);
            // 🔁 Redirigir para evitar reenvío al recargar
            header('Location: index.php?controlador=exam_form');
            exit();
        }

        $index = $_SESSION['current_question'];

        if (!isset($this->questions[$index])) {
            // Redirige si el índice se sale del rango
            header('Location: index.php?controlador=exam_results');
            exit();
        }
        $currentQuestion = $this->questions[$index];
        $currentIndex = $index;
        $questions = $this->questions;
        $progress = round(($index / count($this->questions)) * 100);

        $subtitulo = $this->obtenerSubtitulo($index);

        $data = compact('currentIndex', 'currentQuestion', 'questions', 'progress', 'subtitulo');
        extract($data);

        ob_start();
        include VIEW_PATH . '/Exam_form/index.php';
        $contenido = ob_get_clean();

        include LAYOUT_PATH . '/layout.php';

    }



    private function cargarPreguntas(): array
    {
        return [
            "¿La empresa realiza respaldos periódicos de su información?",
            "¿Existe una política de seguridad informática vigente?",
            "¿Se utilizan antivirus y firewalls actualizados?",
            "¿La empresa tiene un sitio web operativo y actualizado?",
            "¿Se hace uso de redes sociales de manera institucional?",
            "¿Se tiene algún sistema de gestión (ERP, CRM, etc.) implementado?",
            "¿Los procesos críticos están automatizados o digitalizados?",
            "¿Los colaboradores reciben capacitaciones en tecnología?",
            "¿Se monitorea el rendimiento de los sistemas tecnológicos?",
            "¿Se cuenta con soporte técnico interno o externo?",
            "¿Existen indicadores para medir la madurez digital?",
            "¿Se han definido objetivos estratégicos de transformación digital?",
            "¿Hay asignación de presupuesto para innovación tecnológica?",
            "¿La dirección participa activamente en temas tecnológicos?",
            "¿Se promueve la cultura digital en la organización?",
            "¿La empresa evalúa periódicamente su estado de madurez tecnológica?"
        ];
    }
    private function inicializarSesion(): void
    {
        if (!isset($_SESSION['current_question'])) {
            $_SESSION['current_question'] = 0;
            $_SESSION['answers'] = [];
        }
    }

    private function procesarRespuesta($respuesta): void
    {
        if ($respuesta === null)
            return;

        $indice = $_SESSION['current_question'];
        $_SESSION['answers'][$indice] = intval($respuesta);
        $_SESSION['current_question']++;

        if ($_SESSION['current_question'] >= count($this->questions)) {
            header('Location: index.php?controlador=exam_results');
            exit();
        }
    }

    private function obtenerSubtitulo(int $index): string
    {
        return match (true) {
            $index <= 2 => " Seguridad y Protección de la Información",
            $index <= 4 => "Presencia Digital y Comunicación",
            $index <= 6 => "Automatización y Sistemas",
            $index <= 9 => "Capacitación y Cultura Tecnológica",
            default => "Evaluación y Planificación Estratégica",
        };
    }
}