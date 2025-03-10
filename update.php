<?php
require_once("template/header.php");
require_once("template/navbar.php");
require_once("config.php");



// Connexion à la base de données
$pdo = connectDB();

// Ajouter une voiture
if (
    isset($_POST['add_car']) &&
    !empty($_POST['brand']) &&
    !empty($_POST['model']) &&
    !empty($_POST['horsePower']) &&
    !empty($_POST['image'])
) {
    $stmt = $pdo->prepare("INSERT INTO car (brand, model, horsePower, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['brand'], $_POST['model'], $_POST['horsePower'], $_POST['image']]);
    header("Location: update.php");
    exit;
}

// Récupérer les voitures existantes
$requete = $pdo->prepare("SELECT * FROM car");
$requete->execute();
$cars = $requete->fetchAll();
?>

<h2>Modifie une voiture</h2>
<form method="POST" action="update.php">
    <label>Marque :</label>
    <input type="text" name="brand" required>
    <label>Modèle :</label>
    <input type="text" name="model" required>
    <label>Puissance :</label>
    <input type="number" name="horsePower" required>
    <label>Image (nom du fichier) :</label>
    <input type="text" name="image" required>
    <button type="submit" name="add_car">Ajouter</button>
</form>



<?php require_once("template/footer.php"); ?>
