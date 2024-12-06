<?php
include 'db_connection.php';

// Verifica si el formulari s'ha enviat
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validació bàsica
    if (empty($username) || empty($email) || empty($password)) {
        echo "Tots els camps són obligatoris.";
        exit;
    }

    // Comprova si l'email ja està registrat
    $checkEmailQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkEmailQuery);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Aquest email ja està registrat.";
        exit;
    }

    // Hashed password per seguretat
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserta l'usuari a la base de dades
    $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Usuari registrat correctament.";
        // Redirigeix a una pàgina de confirmació o al login
        header("Location: login.php");
        exit;
    } else {
        echo "Error en registrar l'usuari. Torna-ho a intentar.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Mètode de sol·licitud no permès.";
}
?>