<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
} else {
    echo "Utilisateur admin connecté.";
}

include 'get_avis.php'; // Inclusion du fichier qui récupère les avis
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Zoo Arcadia</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="admin-container">
    <h1>Administration du site</h1>

    <!-- Gestion des avis -->
    <h2>Gestion des avis</h2>
    <?php if (!empty($avis)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle PHP pour afficher les avis -->
                <?php foreach ($avis as $avis_item): ?>
                    <tr>
                        <td><?= $avis_item['id']; ?></td>
                        <td><?= htmlspecialchars($avis_item['nom']); ?></td>
                        <td><?= htmlspecialchars($avis_item['email']); ?></td>
                        <td><?= htmlspecialchars($avis_item['message']); ?></td>
                        <td><?= $avis_item['date']; ?></td>
                        <td>
                            <!-- Bouton pour valider un avis -->
                            <a href="valider_avis.php?id=<?= $avis_item['id']; ?>" class="btn">Valider</a>
                            <!-- Bouton pour supprimer un avis -->
                            <a href="supprimer_avis.php?id=<?= $avis_item['id']; ?>" class="btn">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun avis à afficher pour le moment.</p>
    <?php endif; ?>

    <!-- Gestion des services -->
    <h2>Gestion des services</h2>
    <h2>Ajouter un service</h2>
<form method="POST" action="ajouter_service.php">
    <label for="nom">Nom du service :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description du service :</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Ajouter le service</button>
</form>

    <!-- Gestion des habitats -->
   
    <h2>Ajouter un habitat</h2>
<form method="POST" action="ajouter_habitat.php" enctype="multipart/form-data">
    <label for="nom">Nom de l'habitat :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="description">Description de l'habitat :</label>
    <textarea id="description" name="description" required></textarea>

    <label for="image">Image de l'habitat :</label>
    <input type="file" id="image" name="image">

    <button type="submit">Ajouter l'habitat</button>
</form>

    <!-- Bouton pour accéder à la gestion des employés -->
    <h2>Gestion des employés</h2>
    
   <!-- utilisation de javascript pour rediriger pour que le bouton a le meme style que les autres-->
     <button onclick="window.location.href='employe/employe.php'">Accéder à la gestion des employés</button>
    <!-- Formulaire pour ajouter un employé ou vétérinaire -->
<h2>Ajouter un employé ou vétérinaire</h2>
<form method="POST" action="ajouter_employe.php">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="role">Rôle :</label>
    <select id="role" name="role" required>
        <option value="employe">Employé</option>
        <option value="veterinaire">Vétérinaire</option>
    </select>

    <button type="submit">Ajouter l'employé</button>
</form>

</div>

<?php include 'footer.php'; ?>

</body>
</html>