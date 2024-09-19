
<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté et s'il a le rôle 'employé'
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employé') {
    header('Location: ../login.php');
    exit();
}

// Si l'utilisateur est un employé, continuer à afficher la page
require'../get_avis.php'; // Inclut le fichier pour récupérer les avis

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
     <!-- Affichage de la consommation de nourriture -->
     <h2>Consommation de nourriture des animaux</h2>
    <?php
    // Récupérer les informations de nourriture pour les animaux
    $sql = "SELECT n.*, a.prenom AS animal_prenom FROM nourriture n JOIN animaux a ON n.animal_id = a.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $nourriture_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (!empty($nourriture_data)): ?>
        <table>
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Nourriture</th>
                    <th>Quantité</th>
                    <th>Date et Heure</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($nourriture_data as $nourriture): ?>
                    <tr>
                        <td><?= htmlspecialchars($nourriture['animal_prenom']); ?></td>
                        <td><?= htmlspecialchars($nourriture['type_nourriture']); ?></td>
                        <td><?= htmlspecialchars($nourriture['quantite']); ?></td>
                        <td><?= htmlspecialchars($nourriture['date_heure']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucune donnée de nourriture enregistrée pour le moment.</p>
    <?php endif; ?>
</div>

<?php include '../footer.php'; ?>

</body>
</html>