<?php
/**
 * Detalle de la película (Movie detail logic)
 * Este archivo obtiene y muestra la información de una película concreta.
 * Recibe el identificador de la película mediante el parámetro GET ?id=.
 * Se incluye desde front/movie.php.
 */

include __DIR__ . "/../../back/inc/db.php";

/* Check that the movie id exists */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Película no válida.</p>";
    exit;
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

$resultado = $conexion->query($sql);

if ($resultado->num_rows !== 1) {
    echo "<p>Película no encontrada.</p>";
    exit;
}

$fila = $resultado->fetch_assoc();
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

    <div class="contenedor-puntuacion">
        <div class="puntuacion">
            <button class="estrella">★</button>
            <button class="estrella">★</button>
            <button class="estrella">★</button>
            <button class="estrella">★</button>
            <button class="estrella">★</button>
        </div>
    </div>

</main>

<?php
$conexion->close();
?>
