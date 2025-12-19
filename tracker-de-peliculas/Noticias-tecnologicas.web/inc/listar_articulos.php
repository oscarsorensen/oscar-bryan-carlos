<?php
$host = "localhost";
$user = "peliculas_app";
$pass = "Peliculas123$";
$db   = "proyecto_peliculas";

$conexion = new mysqli($host, $user, $pass, $db);
if ($conexion->connect_error) {
    die("Connection failed");
}



$sql = "
SELECT 
    p.nombre,
    p.director,
    p.fecha_estreno,
    c.nombre_categoria,
    p.descripcion
FROM peliculas p
JOIN categorias c ON p.id_categoria = c.id_categoria
ORDER BY p.id_pelicula ASC

";

echo "<h2>All movies</h2>"; 

$resultado = $conexion->query($sql);



while ($fila = $resultado->fetch_assoc()) {
    echo "
        <article>
            <h3>{$fila['nombre']}</h3>
            <p><strong>Director:</strong> {$fila['director']}</p>
            <p><strong>Category:</strong> {$fila['nombre_categoria']}</p>
            <p><strong>Release:</strong> {$fila['fecha_estreno']}</p>
            <p>{$fila['descripcion']}</p>
        </article>
        <hr>
    ";
}

$conexion->close();
?>
