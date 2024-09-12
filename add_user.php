<?php
// Connexion à la base de données
require 'db_connection.php'; // 

// Données de l'utilisateur
$username = 'utilisateur@zooarcadia.com'; // Email de l'utilisateur
$password = 'zoo_arcadia2K24'; // Mot de passe 
$role = 'user'; // Rôle de l'utilisateur

// Hacher le mot de passe 
//sécurité/contre les attaques/conformité
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Requête d'insertion dans la base de données
$sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'username' => $username,
    'password' => $hashed_password,
    'role' => $role
]);

echo "Utilisateur ajouté avec succès!";
?>