<?php
// Iniciamos la sesión para poder acceder a las variables de sesión
session_start(); 
require 'datos.php';
require 'funciones.php';

// Si no hay un usuario en la sesión ni en la cookie, redirigimos a index.php
if (!isset($_SESSION['usuario']) || !isset($_SESSION['respuestas'])) {
    header('Location: index.php');
    exit;
}

// Obtenemos las respuestas del usuario desde la sesión y calculamos los puntos obtenidos
$respuestas = $_SESSION['respuestas'];
$puntos = calcularCoincidencias($respuestas, $reglas);

// Definimos los mensajes según el número de aciertos
$mensajeFinal = '¡Gracias por jugar y recordar viejos tiempos! 📺';
foreach ($mensajes as $minimo => $texto) {
    if ($puntos >= $minimo) {
        $mensajeFinal = $texto;
    }
}

// Obtenemos el nombre del usuario desde la sesión
$usuario = $_SESSION['usuario'];

// Vaciamos las respuestas de la sesión para que, si pulsa "Volver a jugar", empiece el quiz limpio desde cero
unset($_SESSION['respuestas']);

require 'resultadoQuiz.php';
?>