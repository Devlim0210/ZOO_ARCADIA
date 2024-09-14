<!--verification d'authentification-->
<?php
session_start();
require 'db_connection.php'; // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
// Test de la récupération des données
//var_dump($username, $password);// Affiche le nom d'utilisateur et le mot de passe pour déboguer(coté)
 
   
// Préparation la requête pour vérifier si l'utilisateur existe
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();


    if ($user && password_verify($password, $user['password'])) {
        // Afficher le rôle de l'utilisateur
    echo "Le rôle de l'utilisateur est : " . $user['role'];
        // Connexion réussie : enregistrement des infos dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user['role'];

        // Redirection selon le rôle de l'utilisateur
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } elseif ($user['role'] == 'employe') {
            header("Location: /employe/employe.php");
        } elseif ($user['role'] == 'veterinaire') {
            header("Location: veterinaire.php");
        } else {
            echo "Rôle inconnu.";
        }
        exit();
    } else {
        // Mauvais mot de passe ou utilisateur inexistant
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>