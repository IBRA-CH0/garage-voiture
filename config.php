<?php
function connectDB(): PDO
{
    // Configuration de la connexion
    $host = 'localhost';
    $dbName = 'garage12';
    $user = 'root';
    $password = '';

    try {
        // Création de la connexion PDO
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbName;charset=utf8",
            $user,
            $password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Active les erreurs SQL
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Mode de récupération par défaut
            ]
        );

        return $pdo;
    } catch (PDOException $e) {
        // Affichage de l'erreur en cas d'échec de connexion
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}
