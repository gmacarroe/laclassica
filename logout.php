<?php
// Inicia la sessió només si encara no està iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Elimina totes les variables de sessió
session_unset();

// Destrueix la sessió
session_destroy();

// Redirigeix a la pàgina d'inici
header("Location: index.php");
exit;
?>
