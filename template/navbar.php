<header class="navbar">
    <div class="header-logo">
        <a href="index.php">
            <img src="images/logo.jpg" alt="Logo" >
        </a>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="login.php">Connexion</a></li>
            <?php if (isset($_SESSION["users_id"])): ?>
            <li><a href="logout.php">Déconnexion</a></li>
        <?php endif; ?>
        </ul>
    </nav>
</header>