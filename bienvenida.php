<?php

// Iniciamos la sesión para poder acceder a las variables de sesión
session_start();

// Obtenemos el nombre del usuario de la sesión o de la cookie
$usuario = $_SESSION['usuario'] ?? ($_COOKIE['usuario'] ?? '');

// Si no hay un usuario en la sesión ni en la cookie, redirigimos a login.php
if ($usuario === '') {
    header('Location: login.php');
    exit;
}

// Obtenemos si el usuario es nuevo o no desde la sesión, por defecto asumimos que no es nuevo
$esNuevo = $_SESSION['es_nuevo'] ?? false;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Bienvenida - Quiz series</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>

<!-- Aquí creamos el html de bienvenida al usuario, mostrando un mensaje diferente si es nuevo o si ya ha jugado antes -->
    <div class="tarjeta-principal texto-centrado">

        <?php if ($esNuevo): ?>
            <h1>¡Bienvenido/a, <?php echo htmlspecialchars($usuario); ?>! 📺</h1>
            <p>Nos alegra tenerte por aquí. ¡Vamos a empezar el reto!</p>
        <?php else: ?>
            <h1>¡Qué bien, estás de vuelta, <?php echo htmlspecialchars($usuario); ?>! 📺</h1>
            <p>Ya puedes continuar con tu progreso guardado.</p>
        <?php endif; ?>

        <a href="index.php" class="btn">Empezar / Continuar el Quiz ➔</a>

    </div>
</body>
</html>