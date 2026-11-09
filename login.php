<?php 

// Primero de todo iniciamos la sesion para poder acceder a las variables dentro de esta
session_start();

// Si ya hay un usuario en la sesión, redirigimos a bienvenida.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['usuario'] ?? '');

    // Si el nombre no está vacío, lo guardamos en la sesión y en la cookie
    if ($nombre !== '') {
        $usuarioAnterior = $_SESSION['usuario'] ?? ($_COOKIE['usuario'] ?? '');

        // Si el usuario anterior es diferente al nuevo, reiniciamos la sesión
        if ($usuarioAnterior !== '' && strcasecmp($usuarioAnterior, $nombre) !== 0) {
            session_unset();
            session_destroy();
            session_start();
            
            $_SESSION['respuestas'] = []; 
            $_SESSION['es_nuevo'] = true;  
        } // Si el usuario anterior es igual al nuevo, no reiniciamos la sesión
        else {
            $_SESSION['es_nuevo'] = ($usuarioAnterior === ''); 
        }

        // Guardamos el nombre del usuario en la sesión y en la cookie
        $_SESSION['usuario'] = $nombre;
        setcookie('usuario', $nombre, time() + 86400); // Guardamos la cookie por 24h
        
        // Redirigimos a bienvenida.php
        header('Location: bienvenida.php');
        exit;
    }
}

// Si no hay un usuario en la sesión, intentamos obtenerlo de la cookie
$nombreGuardado = $_COOKIE['usuario'] ?? '';
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Quiz Nostalgia TV 2000</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- Aquí cramos el html con una pequeña introduccion a nuestra página -->
    <div class="tarjeta-principal texto-centrado">

        <h1>Quiz Nostalgia TV 2000 📺</h1>
        
        <p>
          ¿Eres capaz de adivinar todas las series de tu infancia? Vamos a poner a prueba tu memoria. 
          Tienes que adivinar a qué serie pertenece cada imagen. Al finalizar verás tus puntos totales.
        </p>

        <p style="font-weight: 500; margin-bottom: 15px;">Escribe tu nombre para empezar a jugar:</p>

    <!-- Con un metodo POST enviamos el nombre del usuario a la misma página para procesarlo y guardarlo en la sesión y en la cookie -->
        <form method="POST" action="login.php">
            <input type="text" name="usuario" class="input-nombre" maxlength="30"
                   value="<?= htmlspecialchars($nombreGuardado) ?>" placeholder="Tu nombre..." required />
            <button type="submit" class="btn">Entrar al Quiz</button>
        </form>

    </div>
</body>
</html>