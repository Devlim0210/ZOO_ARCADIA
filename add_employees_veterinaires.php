<?php
// Connexion à la base de données
require 'db_connection.php'; 

// Données pour l'employé
$employee_email = 'employe@zooarcadia.com';
$employee_password = 'employe_password'; // Mot de passe en clair à hacher
$employee_role = 'employé';

// Hacher le mot de passe de l'employé
$hashed_employee_password = password_hash($employee_password, PASSWORD_DEFAULT);

// Insertion de l'employé dans la base de données
$sql_employee = "INSERT INTO users (nom, email, password, role) VALUES (:nom, :email, :password, :role)";
$stmt_employee = $pdo->prepare($sql_employee);
$stmt_employee->execute([
    'nom' => 'Employé',
    'email' => $employee_email,
    'password' => $hashed_employee_password,
    'role' => $employee_role
]);

echo "Employé ajouté avec succès!<br>";

// Données pour le vétérinaire
$veterinaire_email = 'veterinaire@zooarcadia.com';
$veterinaire_password = 'veterinaire_password'; // Mot de passe en clair à hacher
$veterinaire_role = 'vétérinaire';

// Hacher le mot de passe du vétérinaire
$hashed_veterinaire_password = password_hash($veterinaire_password, PASSWORD_DEFAULT);

// Insertion du vétérinaire dans la base de données
$sql_veterinaire = "INSERT INTO users (nom, email, password, role) VALUES (:nom, :email, :password, :role)";
$stmt_veterinaire = $pdo->prepare($sql_veterinaire);
$stmt_veterinaire->execute([
    'nom' => 'Vétérinaire',
    'email' => $veterinaire_email,
    'password' => $hashed_veterinaire_password,
    'role' => $veterinaire_role
]);

echo "Vétérinaire ajouté avec succès!";
?>