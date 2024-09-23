<?php
if (getenv("DATABASE_URL")) {
    // Connexion en ligne (par exemple, avec PostgreSQL)
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:host={$db['host']};port={$db['port']};dbname=" . ltrim($db["path"], "/"), $db["user"], $db["pass"]);
} else {
    // Connexion locale avec MySQL
    $db = [
        'host' => 'localhost',
        'port' => '3306',
        'user' => 'root',
        'pass' => '',  // Si tu as un mot de passe MySQL local, remplace cette valeur
        'dbname' => 'zoo_arcadia'  // Remplace par le nom de ta base de données MySQL locale
    ];
    $pdo = new PDO("mysql:host={$db['host']};port={$db['port']};dbname={$db['dbname']}", $db['user'], $db['pass']);
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>