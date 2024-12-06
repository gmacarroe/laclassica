<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$current_page = basename($_SERVER['PHP_SELF']);
?>

<header class="navbar">
    <nav>
        <ul class="menu-left">
            <li><a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>">Inici</a></li>
            <li><a href="qui_som.php" class="<?= $current_page == 'qui_som.php' ? 'active' : '' ?>">Qui som</a></li>
            <li><a href="catalog.php" class="<?= $current_page == 'catalog.php' ? 'active' : '' ?>">Catàleg</a></li>
            <li><a href="contacte.php" class="<?= $current_page == 'contacte.php' ? 'active' : '' ?>">Contacte</a></li>
        </ul>
        <ul class="menu-right">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="profile.php" class="<?= $current_page == 'profile.php' ? 'active' : '' ?>">Perfil</a></li>
                <li><a href="logout.php" class="logout-btn">Tanca la sessió</a></li>
            <?php else: ?>
                <li><a href="registre.php" class="<?= $current_page == 'registre.php' ? 'active' : '' ?>">Registra't</a></li>
                <li><a href="login.php" class="<?= $current_page == 'login.php' ? 'active' : '' ?>">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>