<?php
include 'db_connection.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Recuperar dades del formulari
$name = $_POST['name'];
$email = $_POST['email'];

// Comprovar si l'email ja existeix
$sql_check = "SELECT * FROM clients WHERE email = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Aquest correu electrònic ja existeix a la nostra base de dades.";
} else {
    // Inserir les dades a la base de dades
    $sql_insert = "INSERT INTO clients (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        echo "Gràcies per contactar-nos! Les teves dades s'han guardat correctament.";
    } else {
        echo "Error: No s'han pogut guardar les dades. Torna-ho a provar.";
    }
}

$stmt->close();
$conn->close();
?>