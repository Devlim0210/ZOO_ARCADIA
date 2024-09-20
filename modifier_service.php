<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM services WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$service) {
        echo "Service non trouvé";
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $description = $_POST['description'];
        
        $sql = "UPDATE services SET nom = :nom, description = :description WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['nom' => $nom, 'description' => $description, 'id' => $id]);
        
        echo "Service modifié avec succès";
        header("Location: admin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un service</title>
</head>
<body>

<h1>Modifier le service</h1>
<form method="POST">
    <label for="nom">Nom du service :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($service['nom']); ?>" required>
    
    <label for="description">Description du service :</label>
    <textarea id="description" name="description" required><?= htmlspecialchars($service['description']); ?></textarea>
    
    <button type="submit">Modifier le service</button>
</form>

</body>
</html>