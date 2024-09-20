
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
session_start();


// Vérifier si l'utilisateur est un admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

require 'db_connection.php'; // Connexion à la base de données

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST); // Pour vérifier ce qui est soumis
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hachage du mot de passe
    $role = $_POST['role'];

    // Requête pour insérer l'employé ou le vétérinaire dans la base de données
    $sql = "INSERT INTO users (nom,email, password, role, date_creation) VALUES (:nom, :email, :password, :role, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'email' => $email,
        'password' => $password,
        'role' => $role
    ]);

    echo "Employé ou vétérinaire ajouté avec succès!";
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un employé ou vétérinaire</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="container">
    <h1>Ajouter un employé ou vétérinaire</h1>

    <form method="POST" action="ajouter_employe.php">
   

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="role">Rôle :</label>
    <select id="role" name="role" required>
        <option value="employe">Employé</option>
        <option value="veterinaire">Vétérinaire</option>
    </select>

    <button type="submit">Ajouter l'employé</button>
</form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>