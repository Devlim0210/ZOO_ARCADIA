# Zoo Arcadia

## Description

## Description

Zoo Arcadia est un site web interactif et écoresponsable conçu pour offrir aux visiteurs une expérience immersive dans différents habitats animaliers. Le site permet aux utilisateurs de découvrir les animaux, de laisser des avis sur leur visite, et de contacter l'équipe du zoo pour toute demande d'information. Une section spéciale est dédiée à l'administration et aux employés, leur permettant de gérer les avis des visiteurs et de mettre à jour les services offerts par le zoo. Ce projet met en avant la protection de l'environnement et l'engagement envers le bien-être animal.

## Fonctionnalités

- Découverte des habitats animaliers
- Formulaire de contact pour les visiteurs
- Soumission et gestion des avis des visiteurs
- Section de connexion pour l'administration et les employés
- Interface pour les employés pour valider ou supprimer des avis

## Technologies Utilisées

- **HTML5 & CSS3** : Structure et style des pages
- **JavaScript** : Interactions dynamiques et validations de formulaire
- **PHP** : Gestion des formulaires, connexions et pages dynamiques
- **MySQL** : Gestion des avis et des utilisateurs
- **Git & GitHub** : Versionnement du projet

## Installation et Configuration

### Prérequis

- Serveur local (XAMPP, MAMP, WAMP)
- Git

### Étapes d'installation

1. Cloner le dépôt GitHub :
   • Tape cette commande dans ton terminal pour cloner le projet localement :
   git clone https://github.com/Devlim0210/ZOO_ARCADIA.git

2. Importer la base de données MySQL :
   • L’utilisateur devra importer la base de données pour que le site fonctionne correctement.
   • Via phpMyAdmin :
   • Créer une nouvelle base de données zoo_arcadia.
   • Importer le fichier zoo_arcadia.sql (tu l’as déjà exporté).
   • Cela configure la base de données avec les tables nécessaires (avis, utilisateurs, etc.).
3. Configurer la connexion à la base de données :
   • L’utilisateur doit configurer le fichier db_connection.php pour qu’il puisse se connecter à la base de données MySQL.
   • Exemple :
   $host = 'localhost';
    $dbname = 'zoo_arcadia';
   $username = 'root';
   $password = '';
4. Lancer le serveur local :
   • L’utilisateur doit utiliser un serveur local comme XAMPP, MAMP, ou WAMP pour exécuter le projet.
   • Après avoir démarré le serveur, il peut accéder au site en ouvrant localhost/zoo_arcadia dans son navigateur.
