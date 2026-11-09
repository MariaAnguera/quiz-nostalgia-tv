<?php

// Iniciamos la sesión para poder acceder a las variables de sesión
session_start(); 

// Borramos la cookie del usuario estableciendo su tiempo de expiración en el pasado
setcookie('usuario', '', time() - 3600); 

// Limpiamos y destruimos la sesión
session_unset(); // Limpiamos todas las variables de sesión
session_destroy(); // Destruimos la sesión

// Redirigimos al usuario a la página de login.php
header('Location: login.php');
exit;
?>