<h1 align="center">Sistema de Diagnóstico de Madurez Tecnológica</h1>

<p align="center">
  🧠 Evaluación interactiva para empresas | 🔍 IA personalizada | ⚙️ PHP Puro + MVC | 🇵🇪 Perú
</p>

---

### ¿Qué es?

Este sistema web permite a una empresa diagnosticar su nivel de madurez tecnológica mediante un cuestionario temático.  
Al finalizar, muestra resultados visuales y una **recomendación generada por IA** según el puntaje obtenido.

---

### Tecnologías usadas

```php
$stack = [
  'backend' => 'PHP Puro',
  'arquitectura' => 'MVC desde cero',
  'base_datos' => 'MySQL',
  'frontend' => ['HTML', 'CSS', 'Bootstrap'],
  'api' => 'Groq (IA tipo ChatGPT)'
];
```
---
### 📌 Módulos principales
📝 Diagnóstico por secciones (preguntas agrupadas por temas)

📊 Resultados con interpretación y nivel asignado

🤖 Chat IA: asesor virtual que responde con base en tu resultado

🗃️ Historial de evaluaciones realizadas

👤 Perfil y recomendaciones
---

### 🤖 Integración con IA
La clase IAHelper.php se conecta con la API de Groq (modelo llama-3.1-8b-instant) para:

Generar recomendaciones personalizadas según el promedio

Responder preguntas del usuario desde el módulo de asesor

✅ La clave API se encuentra protegida
---
### 📷 Vista previa

![Vista previa del sistema](https://raw.githubusercontent.com/GaelTech404/diagnostico_tecnologico/main/public/assets/img/madurez_tech.jpg)
