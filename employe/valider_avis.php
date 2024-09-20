<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est un employé
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employé') {
    header('Location: ../login.php');
    exit();
}

require '../db_connection.php'; // Connexion à la base de données

// Vérifier si l'ID de l'avis est passé dans l'URL
if (isset($_GET['id'])) {
    $avis_id = (int)$_GET['id'];

    // Vérifier si l'avis est déjà validé
    $stmt = $pdo->prepare("SELECT valide FROM avis WHERE id = :id");
    $stmt->execute(['id' => $avis_id]);
    $avis = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($avis['valide'] == 1 || $avis['valide'] === "1") {
        echo "Cet avis est déjà validé.";
    } else {
        // Requête pour marquer l'avis comme validé
        $sql = "UPDATE avis SET valide = 1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $avis_id]);

        if ($stmt->rowCount()) {
            // Redirection après validation
            header('Location: employe.php');
            exit();
        } else {
            echo "Erreur : Impossible de valider l'avis.";
            print_r($stmt->errorInfo());
        }
    }
} else {
    echo "Aucun avis sélectionné.";
}