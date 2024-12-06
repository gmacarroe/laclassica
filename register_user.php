<?php
include 'db_connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validació bàsica
    if (empty($username) || empty($email) || empty($password)) {
        echo "Error: Tots els camps són obligatoris.";
        exit;
    }

    // Comprova si l'email ja està registrat
    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    if (!$stmt) {
        echo "Error en preparar la consulta: " . $conn->error;
        exit;
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Error: Aquest email ja està registrat.";
        exit;
    }

    // Hasheja la contrasenya
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserta l'usuari a la base de dades
    $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    if (!$stmt) {
        echo "Error en preparar la consulta d'inserció: " . $conn->error;
        exit;
    }
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Usuari registrat correctament.";
        header("Location: login.php?success=1");
        exit;
    } else {
        echo "Error en inserir l'usuari: " . $stmt->error;
        exit;
    }
}

$conn->close();
?>