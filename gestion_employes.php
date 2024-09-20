<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'db_connection.php'; // Connexion à la base de données

// Récupérer tous les employés
$sql = "SELECT id, nom, email, role, date_creation FROM users WHERE role != 'admin'";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des employés</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h1>Gestion des employés</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date de création</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employes as $employe): ?>
                <tr>
                    <td><?= $employe['id']; ?></td>
                    <td><?= htmlspecialchars($employe['nom']); ?></td>
                    <td><?= htmlspecialchars($employe['email']); ?></td>
                    <td><?= htmlspecialchars($employe['role']); ?></td>
                    <td><?= $employe['date_creation']; ?></td>
                    <td>
                        <a href="modifier_employe.php?id=<?= $employe['id']; ?>" class="btn">Modifier</a>
                        <a href="supprimer_employe.php?id=<?= $employe['id']; ?>" class="btn">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

</body>
</html>