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
  <title>ClàssiK - Contacte</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header class="navbar">
    <nav>
      <ul>
        <li><a href="index.php">Inici</a></li>
        <li><a href="qui_som.php">Qui som</a></li>
        <li><a href="catalog.php">Catàleg</a></li>
        <li><a href="contacte.php" class="active">Contacte</a></li>
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

  <section class="contacte">
    <h2>Contacta amb nosaltres</h2>
    <form onsubmit="sendEmail(event)">
      <input type="text" name="from_name" placeholder="El teu nom" required>
      <input type="email" name="reply_to" placeholder="El teu correu" required>
      <textarea name="message" placeholder="El teu missatge" required></textarea>
      <button type="submit" class="cta">Envia</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
  </footer>
</body>
</html>
