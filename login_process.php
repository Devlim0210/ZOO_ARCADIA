<!--verification d'authentification-->
<?php
session_start();
require 'db_connection.php'; // Connexion à la base de données
// Activer l'affichage des erreurs pour voir ce qui se passe
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le champ 'email' est présent dans $_POST avant de l'utiliser
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : null;
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : null;
// Test de la récupération des données
//var_dump($username, $password);// Affiche le nom d'utilisateur et le mot de passe pour déboguer(coté)
 
   
// Préparation la requête pour vérifier si l'utilisateur existe
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    //  Exécuter la requête en passant le paramètre 'email'
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
// Afficher les données récupérées pour déboguer
var_dump($user);

    if ($user && md5($password) === $user['password']) {
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