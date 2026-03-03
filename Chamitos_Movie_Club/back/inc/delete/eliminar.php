<?php
include __DIR__ . "/../db.php";


$id = $_GET['id'];

$sql = "DELETE FROM peliculas WHERE id_pelicula = $id";

$conexion->query($sql);

$conexion->close();

header("Location: ../../escritorio.php");
exit;

?>
