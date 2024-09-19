<?php
session_start(); // Démarre la session

// Détruit toutes les données de session
session_unset();
session_destroy();

// Redirige vers la page de login ou d'accueil
header("Location: login.php");
exit();