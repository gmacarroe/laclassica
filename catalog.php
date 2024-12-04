<?php
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
                <li><a href="index.html">Inici</a></li>
                <li><a href="qui_som.html">Qui som</a></li>
                <li><a href="catalog.php" class="active">Catàleg</a></li>
                <li><a href="contacte.html">Contacte</a></li>
            </ul>
        </nav>
    </header>

    <section class="catalog">
        <h2>Catàleg de Productes</h2>
        <div class="productes">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Si no hi ha una imatge definida, utilitza la imatge per defecte
                    $image_url = !empty($row['image_url']) ? $row['image_url'] : 'images/default_image.png';
                    
                    echo "<div class='producte'>";
                    echo "<img src='" . htmlspecialchars($image_url) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><strong>Preu: </strong>" . htmlspecialchars($row['price']) . " €</p>";
                    echo "<p><strong>Stock: </strong>" . htmlspecialchars($row['stock']) . " unitats</p>";
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