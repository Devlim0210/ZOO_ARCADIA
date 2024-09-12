<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ZOO_ARCADIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
     <!-- header -->
     <?php include 'header.php'; ?>

    <div  class="login-container">
        <h1>Connexion</h1>
        <form action="login_process.php" method="POST">
            <label for="username">Nom d'utilisateur(email)</label>
            <input type="text" id="username" name="username" placeholder="Entrez votre email" required>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
            <button type="submit">Se Connecter</button>
        </form>
        <!-- Inclure le fichier 'error_messages.php'pour les messages d'erreur -->
        <?php include 'error_messages.php'; ?>
    </div>
     <!-- Footer -->
     <?php include 'footer.php'; ?>
</body>