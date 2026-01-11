
<?php

include __DIR__ . "/../back/inc/db.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $comentario = $_POST['comentario'];
    $id_pelicula    = $_POST['id_pelicula'];
    $id_usuario     = $_POST['id_usuario'];

    $sql = "
    INSERT INTO resenas(
        comentario,
        id_pelicula,
        id_usuario

    ) VALUES (
        '$comentario',
        $id_pelicula,
        $id_usuario
    )
";

        try {
            $conexion->query($sql);
            header("Location: ./movie.php?id=$id_pelicula");

        } catch (PDOException $e) {
            header("Location: ./movie.php?id=$id_pelicula&error=exists");
        }

    

}

?>