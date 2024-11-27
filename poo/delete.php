<?php
include("Database1.php");

// Vérification de l'ID dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID invalide.");
}

$id = intval($_GET['id']); // Conversion en entier

// Instance de la classe Database


if ($db->deleteUser($id)) {
    header("Location: read.php");
    exit();
} else {
    echo "Erreur lors de la suppression.";
}
?>
