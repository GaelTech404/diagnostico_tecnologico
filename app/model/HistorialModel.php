<?php
class HistorialModel
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    // Devuelve todos los registros ordenados por fecha (más reciente primero)
    public function obtenerHistorial(): array
    {
        $sql = "SELECT * FROM historial_examenes ORDER BY fecha DESC";
        $stmt = $this->db->prepare($sql);

        if ($stmt && $stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    // Guarda un nuevo resultado de diagnóstico
    public function guardarResultado(float $promedio, float $total, string $nivel, string $recomendacion): bool
    {
        $sql = "INSERT INTO historial_examenes (promedio, total, nivel, recomendacion_ia) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ddss", $promedio, $total, $nivel, $recomendacion);
            return $stmt->execute();
        }

        return false;
    }

    // Obtiene el último resultado registrado
    public function obtenerUltimoResultado(): ?array
    {
        $sql = "SELECT * FROM historial_examenes ORDER BY fecha DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);

        if ($stmt && $stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }

        return null;
    }
}
