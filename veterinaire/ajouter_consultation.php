<?php
// Ce formulaire permet de sélectionner un animal existant et d’entrer les détails de la consultation (état de l’animal, date, etc.).
session_start(); // Démarre la session

// Vérifier si l'utilisateur est un vétérinaire
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'vétérinaire') {
    header('Location: ../login.php');
    exit();
}

require '../db_connection.php'; // Connexion à la base de données

// Récupérer les animaux de la base de données pour les sélectionner
$sql = "SELECT id, prenom FROM animaux";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Débogage : afficher les animaux récupérés
var_dump($animaux);

// Si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $animal_id = $_POST['animal_id'];
    $consultation_date = $_POST['consultation_date'];
    $etat_animal = $_POST['etat_animal'];
    $details = $_POST['details'];

    // Requête pour insérer les données de consultation dans la base de données
    $sql = "INSERT INTO consultations (animal_id, consultation_date, etat_animal, details) 
            VALUES (:animal_id, :consultation_date, :etat_animal, :details)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'animal_id' => $animal_id,
        'consultation_date' => $consultation_date,
        'etat_animal' => $etat_animal,
        'details' => $details
    ]);

    echo "Consultation ajoutée avec succès!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une consultation - Zoo Arcadia</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>

<?php include '../header.php'; ?>

<div class="container">
    <h1>Ajouter une consultation</h1>

    <form action="ajouter_consultation.php" method="POST">
        <label for="animal_id">Sélectionner un animal :</label>
        <select id="animal_id" name="animal_id" required>
            <?php foreach ($animaux as $animal): ?>
                <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['prenom']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="consultation_date">Date de la consultation :</label>
        <input type="date" id="consultation_date" name="consultation_date" required>

        <label for="etat_animal">État de l'animal :</label>
        <input type="text" id="etat_animal" name="etat_animal" required>

        <label for="details">Détails supplémentaires :</label>
        <textarea id="details" name="details" required></textarea>

        <button type="submit">Ajouter la consultation</button>
    </form>
</div>

<?php include '../footer.php'; ?>

</body>
</html>