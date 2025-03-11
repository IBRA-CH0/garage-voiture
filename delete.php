<?php
require_once("template/header.php");
require_once("template/navbar.php");
require_once("config.php");

// Démarrer la session si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["users_id"])) {
    header("Location: login.php");
    exit;
}

// Connexion à la base de données
$pdo = connectDB();

// Vérifier si un ID est passé dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<p class='message-error'>❌ Erreur : Aucun véhicule sélectionné.</p>";
    exit;
}

$id = intval($_GET['id']); // Sécurisation de l'ID

// Récupérer la voiture sélectionnée
$stmt = $pdo->prepare("SELECT * FROM car WHERE id = :id");
$stmt->execute([':id' => $id]);
$car = $stmt->fetch();

// Vérifier si la voiture existe
if (!$car) {
    echo "<p class='message-error'>❌ Erreur : Voiture non trouvée.</p>";
    exit;
}

// Suppression si l'utilisateur confirme
if (isset($_POST['delete'])) {
    $stmt_delete = $pdo->prepare("DELETE FROM car WHERE id = :id");
    $stmt_delete->execute([':id' => $id]);
    
    echo "<p class='message-success'>🚗 Voiture supprimée avec succès !</p>";

    // Redirection après suppression
    header("Location: admin.php");
    exit;
}

?>

<h2 class="page-title">🗑️ Supprimer une voiture</h2>

<div class="vehicle-container">
    <div class="vehicle-card">
        <img src="images/<?php echo ($car['image']); ?>" class="vehicle-image">
        <div class="vehicle-info">
            <h3 class="vehicle-title"><?php echo ("{$car['brand']} {$car['model']}"); ?></h3>
            <p class="vehicle-power">🚀 Puissance : <strong><?php echo ($car['horsePower']); ?></strong> chevaux</p>
            <form method="POST">
                <button type="submit" name="delete" class="delete-btn">
                    ❌ Supprimer définitivement
                </button>
            </form>
        </div>
    </div>
</div>

<?php require_once("template/footer.php"); ?>