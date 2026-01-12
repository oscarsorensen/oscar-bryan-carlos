<?php
/**
 * Perfil del usuario (User profile)
 * Página personal del usuario autenticado.
 * Muestra:
 * - sus reseñas
 * - su actividad
 */
session_start();
include __DIR__ . "/../back/inc/db.php";
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Chamitos Movie Club - Perfil</title>
  <link rel="stylesheet" href="css/profile.css">
</head>

<body>

<header>
  <h1>Chamitos Movie Club</h1>
  <h2>Perfil del usuario</h2>

  <div class="derecha">
    <button class="inicio" onclick="location.href='index.php'">Main Page</button>

    <?php if (isset($_SESSION['frontend_user'])): ?>
      <button class="registro" onclick="location.href='logout.php'">Logout</button>
    <?php else: ?>
      <button class="registro" onclick="location.href='login.php'">Login</button>
    <?php endif; ?>
  </div>
</header>

<main>

<?php if (!isset($_SESSION['frontend_user'])): ?>

  <p>No has iniciado sesión.</p>
  <p>Debes iniciar sesión para ver tu perfil.</p>

<?php else: ?>

  <section class="perfil-info">
    <h2>Conectado como</h2>
    <p><strong><?= htmlspecialchars($_SESSION['frontend_user']) ?></strong></p>
  </section>

  <?php
    $id_usuario = (int) $_SESSION['frontend_user_id'];

    $sql = "
    SELECT
      r.comentario,
      r.id_pelicula,
      p.nombre,
      p.imagen
    FROM resenas r
    JOIN peliculas p ON r.id_pelicula = p.id_pelicula
    WHERE r.id_usuario = $id_usuario
    ORDER BY r.id_resena DESC
  ";

    $resultado = $conexion->query($sql);
  ?>
<h2 id="resenastitle">Tus reseñas</h2>
  <section class="perfil-resenas">
    

    <?php if ($resultado->num_rows === 0): ?>
      <p>No has escrito ninguna reseña todavía.</p>
    <?php else: ?>
      <?php while ($fila = $resultado->fetch_assoc()): ?>
       
        <article class="resena">

        <a href="movie.php?id=<?= $fila['id_pelicula'] ?>">
          <img
            src="img/peliculas/<?= htmlspecialchars($fila['imagen']) ?>"
            alt="<?= htmlspecialchars($fila['nombre']) ?>"
            class="resena-poster"
          >
        </a>

        <h3>
          <a href="movie.php?id=<?= $fila['id_pelicula'] ?>">
            <?= htmlspecialchars($fila['nombre']) ?>
          </a>
        </h3>

        <p><?= nl2br(htmlspecialchars($fila['comentario'])) ?></p>
        </article>

      <?php endwhile; ?>
    <?php endif; ?>
  </section>

<?php endif; ?>

</main>

<footer>
</footer>

</body>
</html>

<?php
$conexion->close();
?>
