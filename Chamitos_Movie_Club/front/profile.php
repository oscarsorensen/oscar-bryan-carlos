<?php
/**
 * Perfil del usuario (User profile)
 * Página personal del usuario autenticado.
 * Muestra información relacionada con el usuario:
 * - sus reseñas
 * - sus puntuaciones
 * - su actividad dentro del sitio
 * Requiere que el usuario haya iniciado sesión.
 */
session_start();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Chamitos Movie Club - Profile</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<header>
  <h1>Chamitos Movie Club</h1>
  <h2>Perfil del usuario</h2>
</header>

<main>
  <?php
    /**
     * En esta sección se comprobará si el usuario está logueado.
     * Si no lo está, se le redirigirá a la página de login.
     * Si lo está, se mostrarán sus datos personales y actividad.
     */

    if (!isset($_SESSION['usuario'])) {
        echo "<p>Debes iniciar sesión para ver tu perfil.</p>";
        echo '<a href="login.php">Ir al login</a>';
    } else {
        echo "<p>Usuario: ".$_SESSION['usuario']."</p>";
        echo "<p>Aquí se mostrarán tus reseñas y puntuaciones.</p>";
    }
  ?>
</main>

<footer>
</footer>

</body>
</html>
