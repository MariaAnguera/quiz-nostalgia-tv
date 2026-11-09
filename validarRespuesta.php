<?php

// Iniciamos la sesión para poder acceder a las variables de sesión
session_start();
require 'datos.php';

//El header Content-Type indica al navegador que la respuesta es JSON, para que pueda manejarla correctamente en el lado del cliente
header('Content-Type: application/json');

// Obtenemos los datos enviados desde JavaScript en formato JSON y los decodificamos a un array asociativo de PHP
$data = json_decode(file_get_contents('php://input'), true);


// Validamos que se hayan enviado los datos necesarios (pregunta y respuesta) desde el cliente
if (!isset($data['pregunta']) || !isset($data['respuesta'])) {
    echo json_encode(['error' => 'Faltan datos para validar la respuesta']);
    exit;
}
// Obtenemos la pregunta y la respuesta del usuario desde los datos recibidos, las comparamos con la respuesta 
// correcta definida en datos.php y guardamos la respuesta del usuario en la sesión para poder calcular el resultado 
// final al terminar el quiz

$pregunta = $data['pregunta'];
$respuestaUsuario = $data['respuesta'];

$respuestaCorrecta = $reglas[$pregunta] ?? '';
$esCorrecta = ($respuestaUsuario === $respuestaCorrecta);

$_SESSION['respuestas'][$pregunta] = $respuestaUsuario;

// Devolvemos un JSON con la información de si la respuesta es correcta y cuál era la respuesta correcta
echo json_encode([
    'esCorrecta' => $esCorrecta,
    'respuestaCorrecta' => $respuestaCorrecta
]);
?>