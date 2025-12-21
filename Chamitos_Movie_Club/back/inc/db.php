<?php
$conexion = new mysqli(
  "localhost",
  "peliculas_app",
  "Peliculas123$",
  "proyecto_peliculas"
);

if ($conexion->connect_error) {
  die("Database connection failed");
}
