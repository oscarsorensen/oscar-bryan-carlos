<?php
/**
 * Catálogo de películas (Movie catalog)
 * Página principal del sitio.
 * Muestra la lista completa de películas disponibles en la base de datos.
 * Acceso público, no requiere inicio de sesión.
 */

session_start();

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

<nav>
  <div class="izquierda">
    <h1 class="logo">Chamitos Movie Club</h1>
  </div>

  <div class="centro">
    <input type="text" placeholder="Buscar" class="buscador" id="buscador">
  </div>

  <div class="derecha">


<?php if (isset($_SESSION['frontend_user'])): ?>

  <button class="inicio" onclick="location.href='profile.php'">
    Perfil
  </button>

  <button class="registro" onclick="location.href='logout.php'">
    Logout
  </button>

<?php else: ?>

  <button class="registro" onclick="location.href='register.php'">
    Registro
  </button>

  <button class="inicio" onclick="location.href='login.php'">
    Login
  </button>

<?php endif; ?>

</div>



</nav>


<script>
document.addEventListener("DOMContentLoaded", function () {


  // Live søgning (frontend filter)
  const buscador = document.getElementById("buscador");
  const peliculas = document.querySelectorAll(".movie-grid article");

  buscador.addEventListener("input", function () {
    const texto = this.value.toLowerCase().trim();

    peliculas.forEach(pelicula => {
      const tituloEl = pelicula.querySelector("h3 a") || pelicula.querySelector("h3");
      const titulo = (tituloEl ? tituloEl.innerText : "").toLowerCase();

      pelicula.style.display = titulo.includes(texto) ? "" : "none";
    });
  });

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
