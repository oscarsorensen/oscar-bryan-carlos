<?php
$host = "localhost";
$user = "peliculas_app";
$pass = "Peliculas123$";
$db   = "proyecto_peliculas";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "
SELECT id_usuario, username
FROM usuarios
WHERE username = '$username'
AND password = '$password'
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc();
    echo "Login correct. Welcome ".$usuario['username'];
} else {
    echo "Invalid login";
}

$conexion->close();
?>
