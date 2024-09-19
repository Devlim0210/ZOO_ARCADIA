<?php
//page simililaire a l'ajout de nourriturre
// Connexion à la base de données
require '../db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $animal_id = $_POST['animal_id'];
    $diagnostic = $_POST['diagnostic'];
    $traitement = $_POST['traitement'];
    $date_consultation = date('Y-m-d H:i:s'); // Date actuelle

    // Insertion de la consultation dans la base de données
    $sql = "INSERT INTO consultations (animal_id, diagnostic, traitement, date_consultation) VALUES (:animal_id, :diagnostic, :traitement, :date_consultation)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'animal_id' => $animal_id,
        'diagnostic' => $diagnostic,
        'traitement' => $traitement,
        'date_consultation' => $date_consultation
    ]);

    echo "Consultation ajoutée avec succès !";
}
?>