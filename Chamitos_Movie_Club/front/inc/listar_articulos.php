<?php
/**
 * Listado de películas (Movie list)
 * Se incluye desde front/index.php
 */

include __DIR__ . "/../../back/inc/db.php";

$sql = "
SELECT 
    p.id_pelicula,
    p.nombre,
    p.director,
    p.fecha_estreno,
    p.imagen,
    c.nombre_categoria,
    p.descripcion
FROM peliculas p
JOIN categorias c ON p.id_categoria = c.id_categoria
ORDER BY p.id_pelicula ASC
";

$resultado = $conexion->query($sql);

echo "<h2>All movies</h2>";

echo "<div class='movie-grid'>";   // GRID wrapper

while ($fila = $resultado->fetch_assoc()) {
  echo "
      <article class='movie-card'>
          <a href='movie.php?id={$fila['id_pelicula']}'>
              <img src='img/peliculas/{$fila['imagen']}' alt='Poster {$fila['nombre']}'>
          </a>

          <h3>
            <a href='movie.php?id={$fila['id_pelicula']}'>
              {$fila['nombre']}
            </a>
          </h3>
          <p><strong>Director:</strong> {$fila['director']}</p>
          <p><strong>Category:</strong> {$fila['nombre_categoria']}</p>
          <p><strong>Release:</strong> {$fila['fecha_estreno']}</p>
          <p>{$fila['descripcion']}</p>
      </article>
  ";
}


echo "</div>";  

$conexion->close();

