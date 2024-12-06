<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Comprova si l'usuari està loggejat
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include 'db_connection.php';

// Recupera la informació de l'usuari
$user_id = $_SESSION['user_id'];
$query = "SELECT username, email, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Error: Usuari no trobat.";
    exit;
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClàssiK - Perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="navbar">
        <?php include 'navbar.php'; ?>
    </header>

    <section class="profile">
        <h2>El teu perfil</h2>
        <div class="profile-info">
            <p><strong>Nom d'usuari:</strong> <?php echo htmlspecialchars($user['username'], ENT_QUOTES); ?></p>
            <p><strong>Correu electrònic:</strong> <?php echo htmlspecialchars($user['email'], ENT_QUOTES); ?></p>
            <p><strong>Data de registre:</strong> <?php echo htmlspecialchars($user['created_at'], ENT_QUOTES); ?></p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 ClàssiK. Tots els drets reservats.</p>
    </footer>
</body>
</html>