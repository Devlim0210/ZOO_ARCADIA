<!--verification d'authentification-->
<?php
session_start();
require 'db_connection.php'; // Connexion à la base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
// Test de la récupération des données
//var_dump($username, $password);// Affiche le nom d'utilisateur et le mot de passe pour déboguer(coté serveur)
 
   
// Préparation la requête pour vérifier si l'utilisateur existe
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    // Test pour voir si l'utilisateur est trouvé
    //var_dump($user);(coté serveur)

    // Si l'utilisateur est trouvé, vérification le mot de passe
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin'] = true; // Création d'une session pour l'utilisateur
        header('Location: admin.php'); // Redirection vers la page d'administration
        exit();
    } else {
        // En cas d'erreur, redirection avec un message d'erreur
        header('Location: login.php?error=Nom d\'utilisateur ou mot de passe incorrect');
        exit();
    }
}
?>