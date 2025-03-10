<?php
// Démarre la session seulement si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("template/header.php");
require_once("config.php");
require_once("template/navbar.php");

// Connexion à la base de données
$pdo = connectDB();

// Vérifier si l'utilisateur est connecté en vérifiant la session
if (!isset($_SESSION["users_id"])) {
    // Si l'utilisateur n'est pas connecté, le rediriger vers la page de connexion
    header("Location: login.php");
    exit;
}

// Récupération des voitures
$requete = $pdo->prepare("SELECT * FROM car");
$requete->execute();
$cars = $requete->fetchAll();

?>

<header>
</header>

<!-- Afficher l'option "Ajouter une voiture" seulement si l'utilisateur est connecté -->
<nav class="update">
    <a href="add.php">Ajouter une voiture</a>
</nav>

<div class="container">
    <?php foreach ($cars as $car): ?>
        <div class="product">
            <img src="images/<?php echo $car['image']; ?>" alt="<?php echo $car['brand'] ?> <?php echo $car['model'] ?>" style="max-width: 200px;">
            <h2><?php echo $car['brand'] ?> <?php echo $car['model'] ?></h2>
            <p>Puissance : <?php echo $car['horsePower'] ?> chevaux</p>
            <div class="actions">
                <!-- Afficher les boutons Modifier et Supprimer seulement si l'utilisateur est connecté -->
                <a href="update.php?id=<?php echo $car['id']; ?>" class="btn btn-edit">Modifier</a>
                <a href="delete.php?id=<?php echo $car['id']; ?>" class="btn btn-delete">Supprimer</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once("template/footer.php"); ?>
