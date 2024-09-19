<?php
// Connexion à la base de données
//changer le type de mot de passe 
require 'db_connection.php'; 

// Nouveau mot de passe pour l'administrateur
$new_password = 'zoo_arcadia2K24'; 
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Mettre à jour le mot de passe de l'administrateur
$sql = "UPDATE users SET password = :password WHERE email = 'utilisateur@zooarcadia.com'";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'password' => $hashed_password
]);

echo "Mot de passe administrateur mis à jour avec succès !";
?>