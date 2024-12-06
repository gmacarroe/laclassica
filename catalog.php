<?php
session_start();
include 'db_connection.php';

$sql = "SELECT * FROM products WHERE visibility = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClàssiK - Catàleg</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <nav>
            <ul>
                <li><a href="index.php">Inici</a></li>
                <li><a href="qui_som.php">Qui som</a></li>
                <li><a href="catalog.php" class="active">Catàleg</a></li>
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

    <section class="catalog">
        <h2>Catàleg de Productes</h2>
        <div class="productes">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $image_path = "images/" . $row['image_url'];
                    if (!file_exists($image_path)) {
                        $image_path = "images/default_image.png";
                    }

                    echo "<div class='producte'>";
                    echo "<img src='" . $image_path . "' alt='" . htmlspecialchars($row['name'], ENT_QUOTES) . "' class='catalog-image'>";
                    echo "<h3>" . htmlspecialchars($row['name'], ENT_QUOTES) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['description'], ENT_QUOTES) . "</p>";
                    echo "<p><strong>Preu: </strong>" . htmlspecialchars($row['price'], ENT_QUOTES) . " €</p>";
                    echo "<p><strong>Stock: </strong>" . htmlspecialchars($row['stock'], ENT_QUOTES) . " unitats</p>";
                    echo "<button class='cta'>Afegeix al carret</button>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hi ha productes disponibles ara mateix.</p>";
            }
            ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>