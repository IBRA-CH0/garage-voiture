<?php
// Démarre la session uniquement si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Détruire toutes les variables de session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou l'accueil
header("Location: login.php"); // Ou index.php si tu préfères
exit;
?>