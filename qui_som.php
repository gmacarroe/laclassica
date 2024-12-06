<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClàssiK - Qui som</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="navbar">
    <nav>
      <ul>
        <li><a href="index.php">Inici</a></li>
        <li><a href="qui_som.php" class="active">Qui som</a></li>
        <li><a href="catalog.php">Catàleg</a></li>
        <li><a href="contacte.php">Contacte</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="profile.php">Perfil</a></li>
          <li><a href="logout.php">Tanca sessió</a></li>
        <?php else: ?>
          <li><a href="registre.php">Registra't</a></li>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <section class="qui-som">
    <h2>Irreverents per definició</h2>
    <p>A ClàssiK reinterpretem la cultura amb una mirada atrevida i única. Ens inspirem en les arrels catalanes i creem dissenys que parlen per si sols.</p>
  </section>

  <footer>
    <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
  </footer>
</body>
</html>