<?php
//insertion des avis dans la base de données
require 'db_connection.php'; // Connexion à la base de données



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et securiser les données du formulaire
    $nom = htmlspecialchars($_POST['name']?? '');
    $email = htmlspecialchars($_POST['email']?? '');
    $message = htmlspecialchars($_POST['comment'] ??'');
    //var_dump($nom, $email, $message);=> retrait de var dump pr ne pas polluer le retour JS

    // Vérifier que tous les champs sont remplis
    if (!empty($nom) && !empty($email) && !empty($message)) {
        try{
        // Préparer et exécuter la requête SQL
        $sql = "INSERT INTO avis (nom, email, message) VALUES (:nom, :email, :message)";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'message' => $message
        ]);

        if ($success){

        echo "Avis enregistré avec succès !";
    } else {
        echo "Erreur lors de l'enregistremnt de l'avis";
    }
}catch (Exception $e){
    echo "Erreur : " . $e->getMessage();
}
} else {
    echo "Veuillez remplir tous les champs.";
}
} else {
echo "Méthode non autorisée.";
}
?>