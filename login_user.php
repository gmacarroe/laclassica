<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validació bàsica
    if (empty($email) || empty($password)) {
        echo "Tots els camps són obligatoris.";
        exit;
    }

    // Comprova si l'usuari existeix
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verifica la contrasenya
        if (password_verify($password, $user['password'])) {
            // Guarda dades a la sessió
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Benvingut, " . $user['username'];
            // Redirigeix a la pàgina principal o de perfil
            header("Location: index.html");
            exit;
        } else {
            echo "Contrasenya incorrecta.";
        }
    } else {
        echo "Usuari no registrat.";
    }

    $stmt->close();
} else {
    echo "Mètode de sol·licitud no permès.";
}

$conn->close();
?>