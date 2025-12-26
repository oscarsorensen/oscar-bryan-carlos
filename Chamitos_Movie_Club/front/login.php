<?php
/**
 * Inicio de sesión (Login)
 * Página de autenticación de usuarios.
 * Permite a un usuario introducir su nombre de usuario y contraseña.
 * Tras un login correcto, el usuario obtiene acceso a funciones personales.
 * Esta página solo muestra el formulario; la validación se procesa en backend.
 * 
 * http://localhost:8080/oscar-bryan-carlos/Chamitos_Movie_Club/front/login.php
 * 
 */
	// Aquí más adelante validaremos contra la base de datos

    //Esto arriba es que tenemos que hacer Chamitos 


  // Pero de momento te llevo al escritorio. Que no es guay. Escritorio es para admins (nosotros, no usuarios)
 
?>

<?php
/**
 * Login de usuario (mysqli estilo clase)
 */

session_start();

include __DIR__ . "/../back/inc/db.php";

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "" || $password == "") {
        $error = "Rellena todos los campos.";
    } else {

        $sql = "
            SELECT id_usuario, username, password
            FROM usuarios
            WHERE username = '$username'
        ";

        $resultado = $conexion->query($sql);

        if ($resultado->num_rows == 1) {

            $fila = $resultado->fetch_assoc();

            if (password_verify($password, $fila['password'])) {

                $_SESSION['usuario'] = $fila['username'];
                $_SESSION['id_usuario'] = $fila['id_usuario'];

                header("Location: profile.php");
                exit;

            } else {
                $error = "Contraseña incorrecta.";
            }

        } else {
            $error = "Usuario no existe.";
        }
    }
}
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<h1>Login</h1>

<?php if($error != ""): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <input type="text" name="username" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Entrar</button>
</form>

<a href="Register.php"><br>Crear cuenta</a>

</body>
</html>
