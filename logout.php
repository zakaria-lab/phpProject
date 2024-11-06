<?php
session_start();

// Supprimer le nom d'utilisateur de la session
unset($_SESSION['username']);

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou la page d'accueil
header("Location: index.php?logout=success");
exit();
?>