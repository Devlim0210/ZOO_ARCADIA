<?php
// Récupération des informations de connexion à partir de la variable d'environnement DATABASE_URL
$db = parse_url(getenv("DATABASE_URL"));

try {
    // Connexion à la base de données avec PDO pour PostgreSQL
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"],
        $db["port"],
        $db["user"],
        $db["pass"],
        ltrim($db["path"], "/")
    ));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if (!$pdo) {
    die("Connexion à la base de données échouée !");
}
?>