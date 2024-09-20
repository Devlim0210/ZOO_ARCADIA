<?php
session_start();
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'employé') {
    header("Location: ../login.php");
    exit();
}

require '../db_connection.php'; // Connexion à la base de données

if (isset($_GET['id'])) {
    $avis_id = (int)$_GET['id'];

    // Requête pour supprimer l'avis
    $sql = "DELETE FROM avis WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $avis_id]);

    // Redirection après suppression
    header("Location: employe.php");
    exit();
} else {
    echo "Aucun avis sélectionné.";
}
?>

