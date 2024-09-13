<?php
require '../db_connection.php'; // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type_nourriture = htmlspecialchars($_POST['type_nourriture']);
    $quantite = (int)$_POST['quantite'];

    // Insertion dans la base de données
    $sql = "INSERT INTO nourriture (type_nourriture, quantite) VALUES (:type_nourriture, :quantite)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['type_nourriture' => $type_nourriture, 'quantite' => $quantite]);

    echo "Nourriture ajoutée avec succès !";
}
?>

<!-- Formulaire d'ajout de nourriture -->
<form action="ajouter_nourriture.php" method="POST">
    <label for="type_nourriture">Type de nourriture :</label>
    <input type="text" id="type_nourriture" name="type_nourriture" required>
    <label for="quantite">Quantité :</label>
    <input type="number" id="quantite" name="quantite" required>
    <button type="submit">Ajouter</button>
</form>