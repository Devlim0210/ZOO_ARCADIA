<?php
session_start();
require 'db_connection.php';

// Vérifier si l'utilisateur est admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Supprimer l'employé
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $