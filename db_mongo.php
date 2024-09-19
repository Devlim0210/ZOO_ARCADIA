<?php
require 'vendor/autoload.php'; // Assure-toi que Composer est bien configuré

$client = new MongoDB\Client("mongodb+srv://ftrdevlim:Limited90210*@cluster0.tomuv.mongodb.net/zoo_arcadia?retryWrites=true&w=majority");

// Insérer un document de test
$collection = $client->zoo_arcadia->animaux;
$result = $collection->insertOne(['nom' => 'Tigre', 'habitat' => 'Forêt']);
echo "Document inséré avec l'ID : " . $result->getInsertedId();
?>