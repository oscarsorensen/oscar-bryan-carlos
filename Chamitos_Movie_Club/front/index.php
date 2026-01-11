<?php
/**
 * Catálogo de películas (Movie catalog)
 * Página principal del sitio.
 * Muestra la lista completa de películas disponibles en la base de datos.
 * Acceso público, no requiere inicio de sesión.
 */
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Chamitos Movie Club</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<header>

<nav id="hacia-abajo">

  <div class="izquierda">
    <a href="#hacia-arriba" class="logo">CHAMITOS MOVIE CLUB</a>
  </div>

  <div class="centro">
    <input type="text" placeholder="Buscar" class="buscador">
  </div>

  <div class="derecha">
    <button class="registro" type="button" id="btnRegistrarse">Registro</button>
    <button class="inicio" type="button" id="btnLogin">Iniciar sesión</button>
  </div>

</nav>


<script>
  document.getElementById('btnRegistrarse').addEventListener('click', function () {
    window.location.href = 'register.php';
  });

  document.getElementById('btnLogin').addEventListener('click', function () {
    window.location.href = 'login.php';
  });
</script>



</header>


<main>
  <?php include "inc/listar_articulos.php"; ?>
</main>

<footer>
</footer>

</body>
</html>
