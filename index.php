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
  <title>ClàssiK - Cultura irreverent</title>
  <link rel="stylesheet" href="style.css">
  <script src="carret.js" defer></script>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <!-- Hero Section -->
  <section class="hero">
    <div>
      <h1>ClàssiK - Cultura irreverent</h1>
      <p>Arrels catalanes, actitud global.</p>
      <button class="cta">Descobreix més</button>
    </div>
  </section>

  <!-- Qui som -->
  <section class="qui-som">
    <h2>Irreverents per definició</h2>
    <p>A ClàssiK reinterpretem la cultura amb una mirada atrevida i única.</p>
  </section>

  <!-- Valors -->
  <section class="valors">
    <div class="valor">
      <h3>Cultura</h3>
      <p>Arrelats al territori català i orgullosos de les nostres tradicions.</p>
    </div>
    <div class="valor">
      <h3>Irreverència</h3>
      <p>Trenquem les normes per crear productes únics i autèntics.</p>
    </div>
    <div class="valor">
      <h3>Personalitat</h3>
      <p>Dissenys que parlen per si sols amb actitud i estil.</p>
    </div>
  </section>

  <!-- Testimonis rotatius -->
  <section class="testimonis">
    <h2>Què diuen els nostres clients?</h2>
    <div id="testimonis-container">
      <div class="testimoni">
        <p>"Les tasses de ClàssiK són el toc perfecte per a qualsevol matí rebel!"</p>
        <span>- Marina, Terrassa</span>
      </div>
      <div class="testimoni">
        <p>"Un disseny únic i amb molta personalitat. Això és ClàssiK."</p>
        <span>- Marc, Berga</span>
      </div>
      <div class="testimoni">
        <p>"Perfecte per fer regals amb estil i humor irreverent."</p>
        <span>- Laura, Girona</span>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
    <div class="social-icons">
      <a href="https://www.instagram.com/classik.cat/?hl=es" target="_blank"><img src="images/instagram_white.png" alt="Instagram"></a>
    </div>
  </footer>

</body>
</html>
