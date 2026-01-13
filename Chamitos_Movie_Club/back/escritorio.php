
<!--
 * Escritorio de administración (Admin dashboard)
 * Página principal del backend para gestión de contenido.
 * Requiere que el usuario haya iniciado sesión como administrador.
-->

<?php
session_start();

if (!isset($_SESSION['backend_user'])) {
    header("Location: index.php");
    exit;
}

 ?> 


<!doctype html>
<html lang="es">
	<head>
  	<title>Chamitos Movie Club</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
  	<nav>
<h2>Chamitos Movie Club</h2>
      <button><a href="index.php">Logout from admin</a></button>
      <button><a href="../front/index.php">Ir a la página principal</a></button>
    </nav>
    <main>
      <h1>Escritorio de Administración</h1>
      <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['backend_user']); ?>!</h2>
      <h3>Aquí puedes gestionar los peliculas.</h3>
    	<?php
      	// Esto se conoce como router (enrutador) /////////////
      	if(isset($_GET['accion'])){
        	if($_GET['accion'] == "nuevo"){
          	include "inc/create/formulario.php";
          }else if($_GET['accion'] == "eliminar"){ 					// Defino la acción eliminar
          	include "inc/delete/eliminar.php";							// En ese caso incluyo eliminar.php
          }else if($_GET['accion'] == "editar"){ 						// Defino la acción editar
          	include "inc/update/formularioactualizar.php";	// En ese caso incluyo el formulario de la edicion.php
          }
        }else{
      		include "inc/read/leer.php"; 
        }
      ?>
      <div id="lista_categorias">
      <h3>Lista categorias </h3>
      <ol>
  <li>Acción</li>
  <li>Drama</li>
  <li>Ciencia ficción</li>
  <li>Comedia</li>
  <li>Thriller</li>
  <li>Aventura</li>
  <li>Fantasía</li>
  <li>Romance</li>
  <li>Terror</li>
  <li>Animación</li>
  <li>Documental</li>
  <li>Crimen</li>
  <li>Misterio</li>
  <li>Guerra</li>
  <li>Historia</li>
</ol>
</div>

      <a href="?accion=nuevo" id="nuevo">+</a>
    </main>
  </body>
</html>