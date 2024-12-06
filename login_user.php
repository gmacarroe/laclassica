<?php
include 'db_connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validació bàsica
    if (empty($email) || empty($password)) {
        echo "Error: Tots els camps són obligatoris.";
        exit;
    }

    // Comprova si l'usuari existeix
    $query = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "Error en preparar la consulta: " . $conn->error;
        exit;
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica la contrasenya
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: profile.php");
            exit;
        } else {
            echo "Error: Contrasenya incorrecta.";
            exit;
        }
    } else {
        echo "Error: Usuari no trobat.";
        exit;
    }
}

$conn->close();
?>