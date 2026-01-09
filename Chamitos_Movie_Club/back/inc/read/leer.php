<table>
<?php
include __DIR__ . "/../db.php"; 


$sql = "
  SELECT 
    p.id_pelicula,
    p.nombre,
    p.director,
    p.fecha_estreno,
    c.nombre_categoria
  FROM peliculas p
  LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
  ORDER BY p.id_pelicula ASC
";

$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
    echo "<td>".$fila['nombre']."</td>";
    echo "<td>".$fila['director']."</td>";
    echo "<td>".$fila['fecha_estreno']."</td>";
    echo "<td>".$fila['nombre_categoria']."</td>";
    echo "<td><a href='?accion=editar&id=".$fila['id_pelicula']."' class='editar' title='Editar película'>✎</a></td>";
    echo "<td><a href='?accion=eliminar&id=".$fila['id_pelicula']."' class='eliminar' title='Eliminar película'>✖</a></td>";
  echo "</tr>";
}

$conexion->close();
?>
</table>
