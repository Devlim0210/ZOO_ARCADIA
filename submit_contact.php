<?php

require 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

   

    // Vérification des champs vides
    if (!empty($name) && !empty($email) && !empty($message)) {
       // Préparer la requête SQL pour insérer les données dans la base de données
       $sql = "INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)";
       $stmt = $pdo->prepare($sql);
       if ($stmt->execute(['nom' => $name, 'email' => $email, 'message' => $message])) {
        echo "Message enregistré avec succès !";
    } 
   } else {
       echo "Tous les champs doivent être remplis.";
   }
}
   
