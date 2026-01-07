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

        <ul>

            <li><a
                    href="mispeliculas.html#hacia-abajo">Mis
                    Peliculas</a></li>
            <li><a
                    href="index.html">Inicio</a>
            </li>
            <li><a
                    href="watchlist.html">Watchlist</a>
            </li>
            <li><a
                    href="reviews.html">Reviews</a>
            </li>

        </ul>

    </div>

    <div class="derecha">

        <input type="text" placeholder="Buscar" class="buscador">

        <div class="menu-perfil">

            <img src="/imagenes/foto-cuenta.avif" alt="" class="perfil">

          <!-- <ul class="opciones-perfil">

                <li><a
                        href="mispeliculas.html#hacia-abajo">Mis
                        Peliculas</a></li>
                <li><a
                        href="index.html">Inicio</a>
                </li>
                <li><a
                        href="watchlist.html">Watchlist</a>
                </li>
                <li><a
                        href="reviews.html">Reviews</a>
                </li>

            </ul>
-->
        </div>

        <button class="registro" type="button" id="btnRegistrarse">Registro</button>
        <script>
            document.getElementById('btnRegistrarse').addEventListener('click', function () {
                window.location.href = 'Register.php';
            });
        </script>

        <button class="inicio" type="button" id="btnLogin">Iniciar sesion</button>
        <script>
            document.getElementById('btnLogin').addEventListener('click', function () {
                window.location.href = 'login.php';
            });
        </script>

    </div>

</nav>

<section class="carrusel-caracteristicas">

    <div class="carrusel">

        <div class="carrusel-imagenes">

            <img src="/imagenes/carrusel-foto-1.jpeg" alt="">
            <img src="/imagenes/carrusel-imagen-2.webp" alt="">
            <img src="/imagenes/carrusel-imagen-3.jpg" alt="">
            <img src="/imagenes/carrusel-imagen-4.jpg" alt="">
            <img src="" alt="">

        </div>

    </div>

</section>

</header>


<main>
  <?php include "inc/listar_articulos.php"; ?>
</main>

<footer>
</footer>

</body>
</html>
