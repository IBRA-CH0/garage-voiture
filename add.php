<?php
require_once("config.php");
require_once("template/header.php");
require_once("template/navbar.php");

// Connexion à la base de données
$pdo = connectDB();

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $horsePower = $_POST['horsePower'];
    $image = $_POST['image'];

    // Requête pour insérer la voiture dans la base de données
    $stmt = $pdo->prepare("INSERT INTO car (brand, model, horsePower, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$brand, $model, $horsePower, $image]);

    // Rediriger vers la page d'index après l'ajout
    header('Location: admin.php');
    exit;
}
?>

<!-- Formulaire d'ajout de voiture -->
<h2>Ajouter une nouvelle voiture</h2>
<form method="POST" action="add.php">
    <label for="brand">Marque :</label>
    <input type="text" name="brand" required><br>

    <label for="model">Modèle :</label>
    <input type="text" name="model" required><br>

    <label for="horsePower">Puissance (chevaux) :</label>
    <input type="number" name="horsePower" required><br>

    <label for="image">Image (nom du fichier) :</label>
    <input type="text" name="image" required><br>

    <button type="submit">Ajouter la voiture</button>
</form>

<?php require_once("template/footer.php"); ?>
