<?php
session_start();
require 'db_connection.php';

// Vérifier si l'utilisateur est admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Récupérer les informations de l'employé à modifier
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET nom = :nom, email = :email, role = :role WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'email' => $email,
        'role' => $role,
        'id' => $id
    ]);

    echo "Employé modifié avec succès !";
    header("Location: admin.php");
    exit();
}
?>

<!-- Formulaire de modification de l'employé -->
<form method="POST">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']); ?>" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>

    <label for="role">Rôle :</label>
    <select id="role" name="role">
        <option value="employe" <?= $user['role'] == 'employe' ? 'selected' : ''; ?>>Employé</option>
        <option value="veterinaire" <?= $user['role'] == 'veterinaire' ? 'selected' : ''; ?>>Vétérinaire</option>
    </select>

    <button type="submit">Modifier</button>
</form>