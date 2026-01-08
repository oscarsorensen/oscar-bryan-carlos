<!-- IMPORTANTE: Este es el index de admin

LOG- IN
usuario
password

/**
 * Backend – Admin entry point
 * Este archivo actúa como puerta de entrada al backend de administración.
 * Comprueba si el usuario ha iniciado sesión como administrador.
 * - Si NO está autenticado: redirige a la página de login de admin.
 * - Si SÍ está autenticado: redirige al escritorio (dashboard).
 * No contiene HTML ni lógica de negocio.
 */
 
-->

<?php
session_start();
include __DIR__ . "/inc/db.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'] ?? "";
    $contrasena = $_POST['contrasena'] ?? "";

    if ($usuario === "" || $contrasena === "") {
        $error = "Rellena todos los campos.";
    } else {

        $sql = "
            SELECT id_usuario, username, password
            FROM usuarios
            WHERE username = '$usuario'
              AND tipo_usuario = 'backend'
        ";

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows === 1) {

            $fila = $resultado->fetch_assoc();

            // Backend = klartekst password
            if ($contrasena === $fila['password']) {

                $_SESSION['backend_user'] = $fila['username'];
                $_SESSION['backend_user_id'] = $fila['id_usuario'];

                header("Location: escritorio.php");
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }

        } else {
            $error = "Usuario no autorizado.";
        }
    }
}
?>



<!doctype html>
<html lang="es">
	<head>
  	<title>Chamitos Movie Club</title>
    <meta charset="utf-8">
    <style>
      html, body {
    width: 100%;
    height: 95%;
    margin: 0;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    background: #1f2933;
}

body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


/* Login box */
form {
    background: #ffffff;
    padding: 32px 28px;
    width: 260px;
    border-radius: 6px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.25);
}

/* Inputs */
form input[type="text"],
form input[type="password"] {
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 4px;
    font-size: 14px;
}

/* Submit button */
form input[type="submit"] {
    background: #2d3a45;
    color: white;
    border: none;
    padding: 10px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background: #3a4a57;
}

h1 {
    color: #e5e7eb;
    font-size: 22px;
    font-weight: 600;
    letter-spacing: 0.5px;
    margin-bottom: 24px;
    text-align: center;
    padding-bottom: 12px;
    border-bottom: 2px solid #fafafa;
}
.error-message {
  background-color: #c62828;
  color: #ffffff;
  border: 1px solid #f5c2c7;
  padding: 12px 16px;
  border-radius: 6px;
  margin-bottom: 16px;
  font-size: 14px;
  text-align: center;
}

    </style>
 
  </head>
  <body>
  <h1>Login de Administrador</h1>
  <?php if ($error !== ""): ?>
    <div class="error-message">
        <?= htmlspecialchars($error) ?>
    </div>
<?php endif; ?>

  <form method="POST">
    	<input type="text" name="usuario" placeholder="usuario">
      <input type="password" name="contrasena" placeholder="contraseña">
      <input type="submit">
    </form>
  </body>
</html>
