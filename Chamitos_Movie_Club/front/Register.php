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
    <link rel="stylesheet" href="Register.css">
    <script src="https://kit.fontawesome.com/e3c79bde02.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php if ($error != ""): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <?php if ($success != ""): ?>
        <p style="color:green"><?= $success ?></p>
        <a href="login.php">Ir a login</a>
    <?php endif; ?>

    <form method="POST" action="Register.php">
        <h1>Registro</h1>
        <?php if ($error): ?>
            <div style="color: orange;" class="error">⚠️ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div style="color: orange;" class="success">✅ <?= $success ?> Redirigiendo en 2 segundos...</div>
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
        <div class="captcha-registro">
            <label><input type="checkbox" name="captcha" required> ¿Eres un robot?</label>
        </div>
        <div class="buttons">
            <button type="submit">Registrarse</button>
            <button type="button" id="btnLogin">Iniciar sesion</button>
            <script>
                document.getElementById('btnLogin').addEventListener('click', function() {
                    window.location.href = 'login.php';
                });
            </script>
        </div>
    </form>

</body>

</html>