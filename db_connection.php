<?php
// Paràmetres de connexió
$servername = "localhost";
$username = "root";
$password = "root"; // Introdueix la contrasenya si en tens
$dbname = "classik_db";

// Crear connexió
$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Comprovar la connexió
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

// Configurar el conjunt de caràcters a UTF-8
$conn->set_charset("utf8");
?>