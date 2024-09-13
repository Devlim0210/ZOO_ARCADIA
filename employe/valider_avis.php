<?php
session_start();
if (!isset($_SESSION['employe'])) {
    header("Location: ../login.php");
    exit();
}

require '../db_connection.php'; // Connexion à la base de données

if (isset($_GET['id'])) {
    $avis_id = (int)$_GET['id'];

    // Requête pour marquer l'avis comme validé
    $sql = "UPDATE avis SET valide = 1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $avis_id]);

    // Redirection après validation
    header("Location: employe.php");
    exit();
} else {
    echo "Aucun avis sélectionné.";
}
?>
