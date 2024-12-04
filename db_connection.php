<?php
// Paràmetres de connexió
$servername = "localhost";
$username = "root";
$password = ""; // Introdueix la contrasenya si en tens
$dbname = "classik_db";

// Crear connexió
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprovar la connexió
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

// Configurar el conjunt de caràcters a UTF-8
$conn->set_charset("utf8");
?>