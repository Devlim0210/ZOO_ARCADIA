<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
} else {
    echo "Utilisateur admin connecté.";
}
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

    <!-- Gestion des services -->
    <h2>Gestion des services</h2>
    
    <!-- Formulaire pour ajouter un service -->
    <h3>Ajouter un service</h3>
    <form method="POST" action="ajouter_service.php">
        <label for="nom">Nom du service :</label>
        <input type="text" id="nom" name="nom" required>

        <label for="description">Description du service :</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit">Ajouter le service</button>
    </form>

    <!-- Liste des services -->
    <h3>Liste des services existants</h3>
    <?php
    // Inclure la connexion à la base de données
    require 'db_connection.php';

    // Récupérer la liste des services existants
    $sql = "SELECT * FROM services";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (!empty($services)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle PHP pour afficher les services -->
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= $service['id']; ?></td>
                        <td><?= htmlspecialchars($service['nom']); ?></td>
                        <td><?= htmlspecialchars($service['description']); ?></td>
                        <td>
                            <!-- Lien pour modifier le service -->
                            <a href="modifier_service.php?id=<?= $service['id']; ?>" class="btn">Modifier</a>
                            <!-- Lien pour supprimer le service -->
                            <a href="supprimer_service.php?id=<?= $service['id']; ?>" class="btn">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Aucun service à afficher pour le moment.</p>
    <?php endif; ?>

    <h2>Gestion des habitats</h2>
    <!-- Gestion des habitats -->
    <h3>Ajouter un habitat</h3>
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
    <button onclick="window.location.href='gestion_employes.php'">Accéder à la gestion des employés</button>

    <!-- Formulaire pour ajouter un employé ou vétérinaire -->
    <h3>Ajouter un employé ou vétérinaire</h3>
    <form method="POST" action="ajouter_employe.php">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
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