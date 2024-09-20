<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//insérer un service dans la base de données 
require 'db_connection.php'; // Connexion à la base de données

// Vérifier si l'utilisateur est admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $sql = "INSERT INTO services (nom, description) VALUES (:nom, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'description' => $description
    ]);

    echo "Service ajouté avec succès !";
    header("Location: admin.php");
    exit();
}
?>