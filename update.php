<?php
require_once("template/header.php");
require_once("template/navbar.php");
require_once("config.php");

// Connexion à la base de données
$pdo = connectDB();

// Vérifier si un ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les infos de la voiture sélectionnée
    $stmt = $pdo->prepare("SELECT * FROM car WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $car = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$car) {
        echo "Aucune voiture trouvée avec cet ID.";
        exit;
    }
} else {
    echo "ID de voiture manquant.";
    exit;
}

// Modifier la voiture si le formulaire est soumis
if (
    isset($_POST['update_car']) &&
    !empty($_POST['brand']) &&
    !empty($_POST['model']) &&
    !empty($_POST['horsePower']) &&
    !empty($_POST['image'])
) {
    $stmt = $pdo->prepare("UPDATE car SET brand = :brand, model = :model, horsePower = :horsePower, image = :image WHERE id = :id");
    $stmt->execute([
        ':brand' => $_POST['brand'],
        ':model' => $_POST['model'],
        ':horsePower' => $_POST['horsePower'],
        ':image' => $_POST['image'],
        ':id' => $id
    ]);

    // Redirection après mise à jour
    header('Location: admin.php');
    exit;
}
?>
<h2> 🔄 Modifier la voiture</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?= $car['id']; ?>">
    <label>Marque :</label>
    <input type="text" name="brand" value="<?= $car['brand']; ?>" required>
    <label>Modèle :</label>
    <input type="text" name="model" value="<?= $car['model']; ?>" required>
    <label>Puissance :</label>
    <input type="number" name="horsePower" value="<?= $car['horsePower']; ?>" required>
    <label>Image (nom du fichier) :</label>
    <input type="text" name="image" value="<?= $car['image']; ?>" required>
    <button type="submit" name="update_car">Modifier</button>
</form>


<?php require_once("template/footer.php"); ?>
