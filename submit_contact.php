<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Vérification des champs vides
    if (!empty($name) && !empty($email) && !empty($message)) {
        // En-têtes de l'email
        $to = "ftr.henintsoa@gmail.com"; 
        $subject = "Nouveau message de $name via le formulaire de contact";
        $body = "Nom: $name\nEmail: $email\n\nMessage:\n$message";

        $headers = "From: $email";

        // Envoi de l'email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message envoyé avec succès !";
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    } else {
        echo "Tous les champs doivent être remplis.";
    }
}
?>