# 📺 Quiz Nostalgia TV 2000

Aplicación web interactiva desarrollada como parte de los proyectos del Ciclo Superior de **Desarrollo de Aplicaciones Web (DAW)**. Consiste en un cuestionario dinámico enfocado en poner a prueba los recuerdos sobre series y programas infantiles de la televisión de los años 2000 en España.

## 🚀 Características técnicas principales
* **Arquitectura Cliente-Servidor Modular:** Código estrictamente separado en lógica de backend (`datos.php`, `funciones.php`, procesamiento), control de acceso y vistas limpias.
* **Validación Asíncrona (AJAX):** Comunicación en tiempo real con el servidor mediante la API `fetch` y `json_encode`, permitiendo comprobar aciertos y errores de forma instantánea sin recargar la página.
* **Gestión de Estado y Persistencia:** 
  * Uso de `session_start()` para mantener el progreso del usuario pregunta a pregunta y evitar bucles de navegación.
  * Uso de `setcookie()` para recordar la identidad del usuario durante 24 horas y ofrecer experiencias personalizadas (saludos diferenciados para usuarios nuevos y recurrentes).
* **Diseño UI/UX Cuidado:** Interfaz moderna y minimalista desarrollada con CSS puro (sin dependencias de `!important`), tipografía *Plus Jakarta Sans* y feedback visual en tiempo real para aciertos (verde) y fallos (rojo).

## 🛠️ Tecnologías utilizadas
* **Backend:** PHP 8+
* **Frontend:** JavaScript (ES6+, Fetch API, Manipulación del DOM)
* **Maquetación:** HTML5, CSS3 (Variables CSS, Flexbox)
* **Control de versiones:** Git y GitHub

## 📁 Estructura del Proyecto
```text
quiz-nostalgia-tv/
│
├── imagenes/             # Recursos gráficos de las series del quiz
├── .gitignore            # Archivos excluidos del control de versiones
├── README.md             # Documentación del repositorio
├── style.css             # Estilos generales de la aplicación
├── login.php             # Control de acceso y portada
├── bienvenida.php        # Saludo personalizado según estado de usuario
├── index.php             # Estructura principal y gestión de bloques por progreso
├── validarRespuesta.php  # Backend de validación asíncrona (JSON)
├── procesar.php          # Cálculo de puntuaciones finales
├── resultadoQuiz.php     # Vista de resultados y opciones de reinicio/salida
├── logout.php            # Destrucción de sesión y limpieza de cookies
├── datos.php             # Array asociativo de respuestas correctas y tramos de mensajes
└── funciones.php         # Funciones dedicadas de validación y lógica de negocio
