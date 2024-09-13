
<?php
//tableau de bord principal pour les employés avec les liens vers differents actions
session_start();
if (!isset($_SESSION['employe'])) {
    header('Location: ../login.php');
    exit();
}

require '../get_avis.php'; // Inclut le fichier pour récupérer les avis

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Employé - Zoo Arcadia</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../header.php'; ?>

<div class="employe-container">
    <h1>Tableau de bord des employés</h1>

    <!-- Gestion des avis pour employés -->
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

    <!-- Autres actions pour les employés -->
    <h2>Actions des employés</h2>
    <div class="actions">
        <a href="ajouter_nourriture.php" class="btn">Ajouter de la nourriture</a>
    </div>
</div>

<?php include '../footer.php'; ?>

</body>
</html>