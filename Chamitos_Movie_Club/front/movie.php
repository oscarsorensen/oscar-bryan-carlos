<?php
/**
 * Detalle de la película (Movie details)
 * Página que muestra la información completa de una película concreta.
 * Recibe el identificador de la película por URL (?id=).
 * Muestra datos como título, descripción, categoría y otra información relevante.
 * Acceso público, no requiere inicio de sesión.
 */

session_start();
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Chamitos Movie Club - Movie</title>
  <link rel="stylesheet" href="css/movie.css">

  
</head>

<body>

<header>
  <div class="topbar">
    <h1>Chamitos Movie Club</h1>

    <div class="mainpa">
  <button class="inicio" type="button" id="btnBack">Main Page</button>
</div>

    <div class="estado-usuario">
      <?php if (isset($_SESSION['frontend_user'])): ?>
        Conectado como <strong><?= htmlspecialchars($_SESSION['frontend_user']) ?></strong>
      <?php else: ?>
        No has iniciado sesión
      <?php endif; ?>
    </div>
  </div>
</header>
<script>
document.getElementById('btnBack').addEventListener('click', function () {
  window.location.href = 'index.php';
});
</script>


<main>
  <?php
    /**
     * Aquí se cargará la película seleccionada.
     * En el siguiente paso se conectará con la base de datos
     * y se usará el parámetro GET 'id' para mostrar la información.
     */
    include "inc/detalle_pelicula.php";
  ?>
</main>

<footer>
</footer>

</body>
</html>
