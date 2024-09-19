<?php
require 'db_connection.php';//connexion a la base de donnée

$sql = "SELECT * FROM avis ORDER BY date DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$avis = $stmt->fetchAll(PDO::FETCH_ASSOC);