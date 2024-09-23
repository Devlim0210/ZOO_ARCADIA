<?php
//insertion des avis dans la base de données


require 'db_connection.php'; // Connexion à la base de données



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['comment']);
    var_dump($nom, $email, $message);

    // Vérifier que tous les champs sont remplis
    if (!empty($nom) && !empty($email) && !empty($message)) {
        // Préparer et exécuter la requête SQL
        $sql = "INSERT INTO avis (nom, email, message) VALUES (:nom, :email, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'message' => $message
        ]);

        echo "Avis soumis avec succès !";
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>