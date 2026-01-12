<?php
/**
 * Detalle de la película (Movie detail logic)
 * Este archivo obtiene y muestra la información de una película concreta.
 * Recibe el identificador de la película mediante el parámetro GET ?id=.
 * Se incluye desde front/movie.php.
 */

include __DIR__ . "/../../back/inc/db.php";

/* A check that the movie id exists */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Película no válida.</p>";
    exit;
}
if (!isset($_GET['error'])) {
    $error = "Resena already exists ";
}

$id_pelicula = (int) $_GET['id'];

$sql = "
SELECT
    p.nombre,
    p.director,
    p.duracion_min,
    p.restriccion_edad,
    p.fecha_estreno,
    p.descripcion,
    p.imagen,
    c.nombre_categoria
FROM peliculas p
JOIN categorias c ON p.id_categoria = c.id_categoria
WHERE p.id_pelicula = $id_pelicula
";

$sql2 = "
SELECT r.comentario, u.nombre
FROM resenas r
JOIN usuarios u ON r.id_usuario = u.id_usuario
WHERE r.id_pelicula = $id_pelicula
";



$resultado = $conexion->query($sql);
$resenas_resultado = $conexion->query($sql2);


/*Another chedk for movies existing or not*/ 
if ($resultado->num_rows !== 1) {
    echo "<p>Película no encontrada.</p>";
    exit;
}

$fila = $resultado->fetch_assoc();
$fila_resenas = $resenas_resultado->fetch_all(MYSQLI_ASSOC);
?>

<!-- OUTPUT (HTML) -->

<main class="informacion">

<img
  src="img/peliculas/<?= htmlspecialchars($fila['imagen']) ?>"
  alt="<?= htmlspecialchars($fila['nombre']) ?>"
>


    <div class="nombre-descripcion">

        <h1><?= htmlspecialchars(strtoupper($fila['nombre'])) ?></h1>

        <div class="año-director">
            <h3><?= htmlspecialchars($fila['fecha_estreno']) ?></h3>
            <h3><?= htmlspecialchars($fila['director']) ?></h3>
        </div>

        <h2><?= htmlspecialchars($fila['descripcion']) ?></h2>

    </div>


    <div id="resenas">
        <h2>Reseñas:</h2>
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error-message'>" . htmlspecialchars($_GET['error']) . "</p>";
        }
        else if (count($fila_resenas) === 0) {
            echo "<p>No hay reseñas para esta película.</p>";
        } else {
            foreach ($fila_resenas as $resena) {
                echo "<div class='resena'>";
                echo "<h3>" . htmlspecialchars($resena['nombre']) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($resena['comentario'])) . "</p>";
                echo "<hr>";
                echo "</div>";
            }
        }
        ?>
    </div>
    <div class="bloque-usuario">

<?php if (!isset($_SESSION['frontend_user'])): ?>

  <p class="login-aviso">
    Debes iniciar sesión para escribir una reseña.
  </p>
  <a href="login.php">Ir al login</a>

<?php else: ?>

  <p class="usuario-logeado">
    Logueado como: <?= htmlspecialchars($_SESSION['frontend_user']) ?>
  </p>

  <form id="reviewForm" method="post" action="procesar_puntuacion.php">
    <input type="hidden" name="id_pelicula" value="<?= $id_pelicula ?>">
    <input type="hidden" name="id_usuario" value="<?= $_SESSION['frontend_user_id'] ?>">

    <label for="comentario">Tu reseña:</label><br>
    <textarea name="comentario" rows="5" cols="40"></textarea><br>

    <button type="submit">Enviar</button>
  </form>

<?php endif; ?>

</div>
</main>





<?php
$conexion->close();
?>
