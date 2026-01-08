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
    $confirm   = $_POST['confirm'];


        if ($nombre == "" || $apellidos == "" || $username == "" || $password == "" || $confirm == "") {
            $error = "Rellena todos los campos.";
        } elseif ($password !== $confirm) {
            $error = "Las contraseñas no coinciden.";
        } 

        else {

        // Verificar si el usuario existe
        $sql = "SELECT id_usuario FROM usuarios WHERE username = '$username'";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $error = "El nombre de usuario ya existe.";
        } else {

            // HASH estilo moderno, pero con mysqli (todavía sencillo)
            $password_seguro = password_hash($password, PASSWORD_DEFAULT);

            $sql = "
            INSERT INTO usuarios (
                nombre,
                apellidos,
                username,
                password,
                fecha_registro,
                tipo_usuario
            ) VALUES (
                '$nombre',
                '$apellidos',
                '$username',
                '$password_seguro',
                NOW(),
                'frontend'
            )
        ";
        

            $conexion->query($sql);

            $_SESSION['frontend_user'] = $username;
            $_SESSION['frontend_user_id'] = $conexion->insert_id;
            $_SESSION['tipo_usuario'] = 'frontend';
            
            header("Location: profile.php");
            exit;
            
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link rel="stylesheet" href="Register.css">
    <script src="https://kit.fontawesome.com/e3c79bde02.js" crossorigin="anonymous"></script>

    <style>
.error-message {
    background-color: #c62828;
    color: white;
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 16px;
    text-align: center;
    font-weight: 600;
}


    </style>
</head>

<body>
<form method="POST" action="register.php">

        <?php if ($error): ?>
            <div class="error-message">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>


        <div class="input-wrapper">
            <i class="fa-regular fa-address-card"></i>
            <input type="text" name="nombre" placeholder="Nombre" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-regular fa-address-card"></i>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
        </div>

        <div class="input-wrapper">
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" placeholder="Usuario" required>

        </div>
        <div class="input-wrapper">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="input-wrapper">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="confirm" placeholder="Confirmar contraseña" required>
        </div>

        <div class="buttons">
            <button type="submit">Registrarse</button>
            <script>
                document.getElementById('btnLogin').addEventListener('click', function() {
                    window.location.href = 'login.php';
                });
            </script>
        </div>
    </form>

</body>

</html>