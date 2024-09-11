<?php
// Informations de connexion à MySQL
$host = 'localhost'; // Hôte 
$dbname = 'ZOO_ARCADIA'; // Nom de la base de données
$username = 'root'; // Nom d'utilisateur MySQL 
$password = ''; // Mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>