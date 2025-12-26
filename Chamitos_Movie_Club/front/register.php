<?php
/**
 * Registro de usuario (versión mysqli estilo clase)
 * Crea un usuario nuevo en la tabla usuarios
 */

session_start();

include __DIR__ . "/../back/inc/db.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre    = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $username  = $_POST['username'];
    $password  = $_POST['password'];

    if ($nombre == "" || $apellidos == "" || $username == "" || $password == "") {
        $error = "Rellena todos los campos.";
    } else {

        // Verificar si el usuario existe
        $sql = "SELECT id_usuario FROM usuarios WHERE username = '$username'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $error = "El nombre de usuario ya existe.";
        } else {

            // HASH estilo moderno, pero con mysqli (todavía sencillo)
            $password_seguro = password_hash($password, PASSWORD_DEFAULT);

            $sql = "
                INSERT INTO usuarios VALUES(
                    NULL,
                    '$nombre',
                    '$apellidos',
                    '$username',
                    '$password_seguro',
                    NOW()
                )
            ";

            $conexion->query($sql);

            $_SESSION['usuario'] = $username;
            $_SESSION['id_usuario'] = $conexion->insert_id;

            $success = "Usuario registrado correctamente.";
        }
    }
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
<link rel="stylesheet" href="css/estilo.css">

</head>
<body>

<h1>Registro</h1>

<?php if($error != ""): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<?php if($success != ""): ?>
<p style="color:green"><?= $success ?></p>
<a href="login.php">Ir a login</a>
<?php endif; ?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre"><br>
    <input type="text" name="apellidos" placeholder="Apellidos"><br>
    <input type="text" name="username" placeholder="Usuario"><br>
    <input type="password" name="password" placeholder="Contraseña"><br>
    <button type="submit">Registrar</button>
</form>

</body>
</html>
