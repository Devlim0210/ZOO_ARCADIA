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
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    // Test pour voir si l'utilisateur est trouvé
    //var_dump($user);
    // Si l'utilisateur est trouvé ou l'employé, vérification le mot de passe
    if ($user && password_verify($password, $user['password'])) {
         // Si l'utilisateur est un employé
         if ($user['role'] === 'employe') {
            $_SESSION['employe'] = true; // Créer la session employé
            header('Location: employe/employe.php');
            exit();
        } else {
            
            $_SESSION['admin'] = true;// Création d'une session pour l'utilisateur
            header('Location: admin.php'); // Redirection vers la page d'administration
            exit();}
       } else {
        // En cas d'erreur, redirection avec un message d'erreur
        header('Location: login.php?error=Nom d\'utilisateur ou mot de passe incorrect');
        exit();
    }
}
?>