<?php

class IAHelper
{
    private const API_URL = 'https://api.groq.com/openai/v1/chat/completions';
    private const MODEL = 'llama-3.1-8b-instant';
    private const TIMEOUT = 10;
    private const CONNECT_TIMEOUT = 3;

    private string $apiKey;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/ia_config.php';

        $this->apiKey = $config['api_key'];
    }

    /**
     * Genera una recomendación basada en el promedio del examen.
     *
     * @param float $promedio
     * @return string
     * @throws Exception
     */
    public function obtenerRecomendacion(float $promedio): string
    {
        $content = sprintf(
            "Una empresa obtuvo un promedio de %.2f en su diagnóstico de madurez tecnológica. ¿Qué recomendación breve (máx. 3 líneas) le darías?",
            $promedio
        );

        $data = [
            "model" => self::MODEL,
            "messages" => [
                ["role" => "system", "content" => "Eres un asesor especializado en transformación digital para empresas."],
                ["role" => "user", "content" => $content]
            ],
            "max_tokens" => 300,
            "temperature" => 0.7
        ];

        $ch = curl_init(self::API_URL);
        curl_setopt_array($ch, [
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Bearer {$this->apiKey}"
            ],
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_TIMEOUT => self::TIMEOUT,
            CURLOPT_CONNECTTIMEOUT => self::CONNECT_TIMEOUT
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($error) {
            throw new Exception("Error de conexión: $error");
        }

        if ($httpCode !== 200) {
            throw new Exception("Error HTTP: $httpCode");
        }

        $result = json_decode($response, true);

        return $result['choices'][0]['message']['content'] ?? 'No se pudo generar la recomendación.';
    }

    public static function consultarIA(string $pregunta): string
    {
        $config = require __DIR__ . '/../config/ia_config.php';

        $apiKey = $config['api_key'];
        $url = 'https://api.groq.com/openai/v1/chat/completions';

        $data = [
            "model" => "llama-3.1-8b-instant",
            "messages" => [
                ["role" => "system", "content" => "Eres un asesor experto en transformación digital para pequeñas empresas. Responde con frases cortas, claras y completas, sin exceder los 3 a 4 renglones. Evita cortes o respuestas a medias."],
                ["role" => "user", "content" => $pregunta]
            ],
            "temperature" => 0.5,
            "max_tokens" => 500
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200 || !$response) {
            throw new Exception("La API de IA no respondió correctamente.");
        }

        $resultado = json_decode($response, true);
        return $resultado['choices'][0]['message']['content'] ?? 'No se pudo obtener respuesta.';
    }
}
