<?php
session_start();
include("dataBASE1.php"); // Connexion à la base de données

// Vérification de l'ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "ID invalide.";
    exit();
}

$id = intval($_GET['id']);
$userModel = new User($conn); // Instance de la classe User
$user = $userModel->getUserById($id);

if (!$user) {
    echo "Utilisateur introuvable.";
    exit();
}

// Traitement du formulaire de mise à jour
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if (empty($name) || empty($email) || empty($phone)) {
        echo "Tous les champs sont obligatoires.";
    } else {
        if ($userModel->updateUser($id, $name, $email, $phone)) {
            header("Location: read.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour.";
        }
    }
}
?>
