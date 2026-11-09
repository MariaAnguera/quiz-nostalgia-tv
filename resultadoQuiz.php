<?php
/**
 * @var int $puntos
 * @var string $mensajeFinal
 * @var string $usuario
 */

// Si no se han definido las variables necesarias, redirigimos a index.php
if (!isset($puntos, $mensajeFinal, $usuario)) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Resultado - Quiz series</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="tarjeta-principal texto-centrado">

    <!-- Aquí creamos el html de resultado del quiz, mostrando los puntos obtenidos y un mensaje final según el resultado -->

       <h1>Resultado de <?= htmlspecialchars($usuario) ?> 🏆</h1>

        <div class="resultado-puntos"><?= $puntos ?> / 10</div>

        <p class="mensaje-resultado"><?= $mensajeFinal ?></p>

        <a href="index.php" class="btn">Volver a jugar</a>
        <a href="cerrarSesion.php" class="btn btn-margen btn-secundario">Cerrar sesión y salir</a>

    </div>
</body>
</html>