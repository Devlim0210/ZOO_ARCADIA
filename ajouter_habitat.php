<?php
// Inclure la connexion à la base de données
require 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    // Vérifier si un fichier image a été soumis
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Chemin de destination de l'image
        $image = 'uploads/' . basename($_FILES['image']['name']);
        
        // Déplacer le fichier dans le répertoire "uploads"
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image = null; // Pas d'image 
    }

    // Insertion des données dans la table "habitats"
    try {
        $stmt = $pdo->prepare("INSERT INTO habitats (nom, description, image) VALUES (:nom, :description, :image)");
        $stmt->execute([
            'nom' => $nom,
            'description' => $description,
            'image' => $image
        ]);
        echo "Habitat ajouté avec succès !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>