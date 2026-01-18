<?php
include __DIR__ . "/../db.php";

/* Traemos la peli espicifico a editar */
$sql = "SELECT * FROM peliculas WHERE id_pelicula = ".$_GET['id'].";";

$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
?>

<form action="inc/update/procesaformulario.php" method="POST">

  <!-- ID (oculto) -->
  <input type="hidden" name="id_pelicula" value="<?= $fila['id_pelicula'] ?>">

  <div class="controlformulario">
    <label for="nombre">Nombre de la película</label>
    <input type="text" name="nombre" id="nombre" value="<?= $fila['nombre'] ?>">
  </div>

  <div class="controlformulario">
    <label for="director">Director</label>
    <input type="text" name="director" id="director" value="<?= $fila['director'] ?>">
  </div>

  <div class="controlformulario">
    <label for="fecha_estreno">Fecha de estreno</label>
    <input type="date" name="fecha_estreno" id="fecha_estreno" value="<?= $fila['fecha_estreno'] ?>">
  </div>

  <div class="controlformulario">
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" id="descripcion"><?= $fila['descripcion'] ?></textarea>
  </div>

  <div class="controlformulario">
    <label for="id_categoria">Categoría (ID 1-15)</label>
    <input type="number" name="id_categoria" id="id_categoria" value="<?= $fila['id_categoria'] ?>">
    <select name="id_categoria"><Option id="1">Option 1</option><Option id="2">Option 2</option></select>
  </div>

  <input type="submit">

</form>

<?php
}
?>
