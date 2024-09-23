<?php
if (getenv("DATABASE_URL")) {
    // Connexion en ligne (PostgreSQL)
    $db = parse_url(getenv("DATABASE_URL"));
    
    // Affichage pour vérifier que les informations de la base de données sont correctes
    var_dump($db); // Vérifie la structure de la variable $db

    try {
        $pdo = new PDO("pgsql:host={$db['host']};port={$db['port']};dbname=" . ltrim($db["path"], "/"), $db["user"], $db["pass"]);
    } catch (PDOException $e) {
        die("Erreur de connexion à PostgreSQL : " . $e->getMessage());
    }
} else {
    // Connexion locale avec MySQL
    $db = [
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => '',  
        'dbname' => 'zoo_arcadia'
    ];
    
    try {
        $pdo = new PDO("mysql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}", $db['user'], $db['pass']);
    } catch (PDOException $e) {
        die("Erreur de connexion à MySQL : " . $e->getMessage());
    }
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>