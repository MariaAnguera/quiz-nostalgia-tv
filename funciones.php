<?php
// Esta función calcula el número de respuestas correctas comparando las respuestas del usuario con las reglas definidas en datos.php
function calcularCoincidencias($respuestas, $reglas) {
    $puntos = 0;

    // En cada vuelta, $campo es la pregunta (preg1, preg2...) y $valorEsperado es la respuesta correcta de datos.php

    foreach ($reglas as $campo => $valorEsperado) {
        // Respuesta del usuario para esa pregunta
        $valorUsuario = $respuestas[$campo] ?? '';

        // Comparamos la respuesta del usuario con la respuesta correcta y sumamos un punto si coinciden
        if ($valorUsuario === $valorEsperado) {
            $puntos++;
        }
    }

    //Devolvemos el total de puntos obtenidos por el usuario
    return $puntos;
}
?>