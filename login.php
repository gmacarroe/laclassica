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
  <title>ClàssiK - Login</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="navbar">
    <nav>
      <ul>
        <li><a href="index.php">Inici</a></li>
        <li><a href="qui_som.php">Qui som</a></li>
        <li><a href="catalog.php">Catàleg</a></li>
        <li><a href="contacte.php">Contacte</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="profile.php">Perfil</a></li>
          <li><a href="logout.php">Tanca sessió</a></li>
        <?php else: ?>
          <li><a href="registre.php">Registra't</a></li>
          <li><a href="login.php" class="active">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <section class="login">
    <h2>Inicia sessió</h2>
    <form action="login.php" method="POST">
      <input type="email" name="email" placeholder="El teu correu" required>
      <input type="password" name="password" placeholder="Contrasenya" required>
      <button type="submit" class="cta">Inicia sessió</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
  </footer>
</body>
</html>
