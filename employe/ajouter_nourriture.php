<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employé') {
    header('Location: ../login.php');
    exit();
}

require '../db_connection.php'; // Connexion à la base de données

// Récupérer les animaux dans la base de données
$sql = "SELECT * FROM animaux";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $animal_id = $_POST['animal_id'];
    $nourriture = $_POST['nourriture'];
    $quantite = $_POST['quantite'];
    $date_heure = $_POST['date_heure'];

    // Insérer les données dans la base de données
    $sql = "INSERT INTO nourriture (animal_id, nourriture, quantite, date_heure) VALUES (:animal_id, :nourriture, :quantite, :date_heure)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'animal_id' => $animal_id,
        'nourriture' => $nourriture,
        'quantite' => $quantite,
        'date_heure' => $date_heure
    ]);

    echo "Nourriture ajoutée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter de la nourriture - Zoo Arcadia</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<h1>Ajouter de la nourriture pour un animal</h1>

<form action="ajouter_nourriture.php" method="post">
    <label for="animal_id">Sélectionner un animal :</label>
    <select name="animal_id" id="animal_id" required>
        <?php foreach ($animaux as $animal): ?>
            <option value="<?= $animal['id']; ?>"><?= $animal['prenom']; ?> (<?= $animal['race']; ?>)</option>
        <?php endforeach; ?>
    </select>

    <label for="nourriture">Nourriture :</label>
    <input type="text" name="nourriture" id="nourriture" required>

    <label for="quantite">Quantité :</label>
    <input type="number" name="quantite" id="quantite" required>

    <label for="date_heure">Date et Heure :</label>
    <input type="datetime-local" name="date_heure" id="date_heure" required>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>