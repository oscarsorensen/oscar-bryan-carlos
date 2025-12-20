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
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Chamitos Movie Club - Login</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<header>
  <h1>Chamitos Movie Club</h1>
  <h2>Inicio de sesión</h2>
</header>

<main>
  <form method="POST" action="../front/profile.php">
    <input type="text" name="username" placeholder="Usuario" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Entrar</button>
  </form>
</main>

<footer>
</footer>

</body>
</html>
