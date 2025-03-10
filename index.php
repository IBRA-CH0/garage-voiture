<?php
require_once("template/header.php");
require_once("config.php");
require_once("template/navbar.php");

// Connexion à la base de données
$pdo = connectDB();

// Récupération des voitures
$requete = $pdo->prepare("SELECT * FROM car");
$requete->execute();
$cars = $requete->fetchAll();
?>

<header>

</header>

<div class="container">
    <?php foreach ($cars as $car): ?>
        <div class="product">
            <img src="images/<?php echo $car['image']; ?>" alt="<?php echo $car['brand'] ?> <?php echo $car['model'] ?>" style="max-width: 200px;">
            <h2><?php echo $car['brand'] ?> <?php echo $car['model'] ?></h2>
            <p>Puissance : <?php echo $car['horsePower'] ?> chevaux</p>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once("template/footer.php"); ?>