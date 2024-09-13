<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
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
    <p>Fonctionnalités à implémenter pour la gestion des services.</p>

    <!-- Gestion des habitats -->
    <h2>Gestion des habitats</h2>
    <p>Fonctionnalités à implémenter pour la gestion des habitats.</p>

    <!-- Bouton pour accéder à la gestion des employés -->
    <h2>Gestion des employés</h2>
    <a href="employe/employe.php" class="btn">Accéder à la gestion des employés</a>

</div>

<?php include 'footer.php'; ?>

</body>
</html>