<?php
// Connexion à la base de données
require 'db_connection.php'; 

// Données de l'utilisateur
$email = 'utilisateur@zooarcadia.com'; // Email de l'utilisateur
$password = 'zoo_arcadia2K24'; // Mot de passe 
$role = 'admin'; // Rôle de l'utilisateur

// Hacher le mot de passe 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Requête d'insertion dans la base de données
$sql = "INSERT INTO users (nom, email, password, role) VALUES (:nom, :email, :password, :role)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nom' => 'Administrateur',  // Le champ 'nom' semble être requis dans ta base de données
    'email' => $email,
    'password' => $hashed_password,
    'role' => $role
]);

echo "Utilisateur ajouté avec succès!";
?>