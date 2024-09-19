<?php
// Démarrer la session et vérifier que l'utilisateur est un vétérinaire
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'vétérinaire') {
    header('Location: ../login.php');
    exit();
}

// Inclure les fichiers nécessaires
require '../db_connection.php'; // Connexion à la base de données
require '../get_avis.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Vétérinaire - Zoo Arcadia</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../header.php'; ?>

<div class="veterinaire-container">
    <h1>Tableau de bord des vétérinaires</h1>

    <!-- Gestion des avis pour les vétérinaires -->
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
                <?php foreach ($avis as $avis_item): ?>
                    <tr>
                        <td><?= $avis_item['id']; ?></td>
                        <td><?= htmlspecialchars($avis_item['nom']); ?></td>
                        <td><?= htmlspecialchars($avis_item['email']); ?></td>
                        <td><?= htmlspecialchars($avis_item['message']); ?></td>
                        <td><?= $avis_item['date']; ?></td>
                        <td>
                            <a href="valider_avis.php?id=<?= $avis_item['id']; ?>" class="btn">Valider</a>
                            <a href="supprimer_avis.php?id=<?= $avis_item['id']; ?>" class="btn">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun avis à afficher pour le moment.</p>
    <?php endif; ?>

    <!-- Autres actions spécifiques aux vétérinaires -->
    <h2>Actions des vétérinaires</h2>
    <div class="actions">
        <!-- Ajouter des actions spécifiques aux vétérinaires -->
        <a href="ajouter_consultation.php" class="btn">Ajouter une consultation</a>
    </div>
</div>

<?php include '../footer.php'; ?>

</body>
</html>