<?php
// Démarre la session seulement si elle n'est pas déjà active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "template/header.php";
require_once "config.php";
require_once("template/navbar.php");

$pdo = connectDB(); // Connexion à la base de données

// Si l'utilisateur est déjà connecté, redirige-le vers la page admin.php
if (isset($_SESSION["users_id"])) {
    header("Location: admin.php");
    exit;
}

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Recherche l'utilisateur dans la table `users` avec l'email
    $search_users = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $search_users->execute([':email' => $email]);
    $user = $search_users->fetch(PDO::FETCH_ASSOC);
    

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($mot_de_passe, $user["mot_de_passe"])) {
        // Si l'authentification réussit, on initialise la session
        $_SESSION["users_id"] = $user["id"];
        $_SESSION["nom"] = $user["nom"]; // Assurez-vous que ce champ existe dans votre table `users`
        header("Location: admin.php"); // Redirection vers la page admin.php après la connexion
        exit;
    } else {
        echo "Email ou mot de passe incorrect."; // Message d'erreur si l'authentification échoue
    }
}
?>

<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Mot de passe:</label>
    <input type="password" name="mot_de_passe" required><br>

    <button type="submit">Se connecter</button>
</form>

<?php require_once("template/footer.php"); ?>