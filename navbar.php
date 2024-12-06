<?php
session_start();
?>

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
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>