
<?php

$servidor = '';
$nombre = '';   
$usuario = '';        
$contrasena = '';  

$conexion = new PDO(

    "mysql:host=$servidor;dbname=$nombre;charset=utf",
    $usuario,
    $contrasena

);

$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$identificador_pelicula = $_GET['slug'] ?? null;

if (!$identificador_pelicula){

    die("Película no especificada.");

}


$consulta = $conexion->prepare("SELECT * FROM peliculas WHERE slug = ?");
$consulta->execute([$identificador_pelicula]);
$datos_pelicula = $consulta->fetch(PDO::FETCH_ASSOC);

if (!$datos_pelicula){

    die("Película no encontrada.");

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="peliculasinfo.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Chamitos Movie Club</title>
</head>
<body>

<header>

    <nav id="hacia-abajo">

        <div class="izquierda">

            <a href="#hacia-arriba" class="logo">CHAMITOS MOVIE CLUB</a>

        </div>

        <div class="centro">

            <ul>

                <li><a href="mispeliculas.html">Mis Peliculas</a></li>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="watchlist.html">Watchlist</a></li>
                <li><a href="reviews.html">Reviews</a></li>

            </ul>

        </div>

        <div class="derecha">

            <input type="text" placeholder="Buscar" class="buscador">

            <div class="menu-perfil">

                <img src="imagenes/foto-cuenta.avif" alt="Perfil" class="perfil">

                <ul class="opciones-perfil">

                    <li><a href="mispeliculas.html">Mis Peliculas</a></li>
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="watchlist.html">Watchlist</a></li>
                    <li><a href="reviews.html">Reviews</a></li>

                </ul>

            </div>

            <button class="registro">Registro</button>
            <button class="inicio">Iniciar Sesión</button>

        </div>

    </nav>

</header>

<main class="informacion">

    <img src="imagenes/<?= htmlspecialchars($datos_pelicula['imagen']) ?>" alt="Película <?= htmlspecialchars($datos_pelicula['titulo']) ?>">

    <div class="nombre-descripcion">

        <h1><?= htmlspecialchars(strtoupper($datos_pelicula['titulo'])) ?></h1>

        <div class="año-director">

            <h3><?= $datos_pelicula['año'] ?></h3>
            <h3><?= htmlspecialchars($datos_pelicula['director']) ?></h3>

        </div>

        <h2><?= htmlspecialchars($datos_pelicula['sinopsis']) ?></h2>

    </div>

    <div class="contenedor-puntuacion">

        <div class="puntuacion">

            <button class="estrella" data-puntuacion="1">★</button>
            <button class="estrella" data-puntuacion="2">★</button>
            <button class="estrella" data-puntuacion="3">★</button>
            <button class="estrella" data-puntuacion="4">★</button>
            <button class="estrella" data-puntuacion="5">★</button>

        </div>

    </div>

</main>

<section class="seccion-comentarios">

    <h3>Deje su comentario</h3>

    <form class="formulario-comentario" method="POST" action="guardar_comentario.php">

        <input type="hidden" name="pelicula_id" value="<?= $datos_pelicula['id'] ?>">
        <textarea name="comentario" class="input-comentario" placeholder="Escribe tu opinión sobre esta película" required></textarea>
        <button type="submit" class="boton-enviar">Publicar</button>

    </form>

</section>

<footer id="hacia-arriba">

    <div class="izquierda">

        <a href="#hacia-abajo" class="logo">CHAMITOS MOVIE CLUB</a>

    </div>

    <ul>

        <li><a href="https://x.com/?lang=es" target="_blank">X</a></li>
        <li><a href="https://www.facebook.com/login/?locale=es_ES" target="_blank">FACEBOOK</a></li>
        <li><a href="https://www.instagram.com/accounts/login/" target="_blank">INSTAGRAM</a></li>
        <li><a href="https://www.tiktok.com/login?lang=es-419" target="_blank">TIKTOK</a></li>

    </ul>
    
</footer>

</body>
</html>