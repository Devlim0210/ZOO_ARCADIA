<header>
    <div class="navbar-container">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo Zoo Arcadia"></a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="habitats.php">Habitats</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="contact.php">Contact</a></li>
                <!-- Affichage du bouton Login ou Déconnexion selon l'état de la session -->
        <?php if (isset($_SESSION['user_id'])): ?>
           <li> <a href="/zoo_arcadia/logout.php" class="btn-disconnection">Déconnexion</a><li>
        <?php else: ?>
            <li><a href="login.php" class="btn-login">Login</a></li>
        <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>