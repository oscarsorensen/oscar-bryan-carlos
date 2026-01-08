
<!--
Dette er login
http://localhost:8080/1-Programacion/010.-Programacion-del-servidor/009-Implantacion-CRUD/Noticias-tecnologicas.web/admin/

Dette er escritorio
http://localhost:8080/1-Programacion/010.-Programacion-del-servidor/009-Implantacion-CRUD/Noticias-tecnologicas.web/admin/escritorio.php

Dette er når man klikker på knappen
http://localhost:8080/1-Programacion/010.-Programacion-del-servidor/009-Implantacion-CRUD/Noticias-tecnologicas.web/admin/escritorio.php?accion=nuevo

/**
 * Escritorio de administración (Admin dashboard)
 * Página principal del backend para gestión de contenido.
 * Requiere que el usuario haya iniciado sesión como administrador.
 */

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
      <a href="?accion=nuevo" id="nuevo">+</a>
    </main>
  </body>
</html>