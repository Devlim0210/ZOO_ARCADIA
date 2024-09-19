<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'vendor/autoload.php'; // Inclure MongoDB PHP Library via Composer

// Connexion à MongoDB Atlas
$client = new MongoDB\Client("mongodb+srv://ftrdevlim:Limited90210*@cluster0.tomuv.mongodb.net/zoo_arcadia?retryWrites=true&w=majority");

// Sélectionner la collection 'animaux' dans la base de données 'zoo_arcadia'
$collection = $client->zoo_arcadia->animaux;

// Insérer un document de test
$result = $collection->insertOne(['nom' => 'Lion', 'habitat' => 'Savane']);
echo "Document inséré avec l'ID : " . $result->getInsertedId();
?>
