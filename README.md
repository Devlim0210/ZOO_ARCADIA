# Titre du Projet

Zoo Arcadia

# Description

Zoo Arcadia est un site web écoresponsable qui permet aux utilisateurs de découvrir différents habitats animaliers, de laisser des avis sur leurs visites, et de contacter l'administration. Le site propose également une interface pour les employés et les administrateurs afin de gérer les avis et autres contenus dynamiques.

## Fonctionnalités

- Découverte des habitats animaliers
- Formulaire de contact pour les visiteurs
- Soumission et gestion des avis des visiteurs
- Section de connexion pour l'administration et les employés
- Interface pour les employés pour valider ou supprimer des avis

## Technologies Utilisées

- _HTML5 & CSS3_ : Pour la structure et le style des pages
- _JavaScript_ : Pour les interactions dynamiques et les validations de formulaire
- _PHP_ : Pour la gestion des formulaires, des connexions, et des pages dynamiques
- _MySQL_ : Pour la gestion des avis et des utilisateurs (base de données relationnelle)
- _Git & GitHub_ : Pour le versionnement du projet

## Installation et Configuration

### Prérequis

- Un serveur local comme **XAMPP**, **MAMP**, ou **WAMP** pour exécuter PHP et MySQL
- **Git** pour cloner le dépôt

### Étapes d'installation

1.  Cloner le dépôt GitHub :

```bash
git clone https://github.com/tonutilisateur/zoo_arcadia.git
```

2.  Importer la base de données MySQL en utilisant le fichier zoo_arcadia.sql :
    • Accédez à phpMyAdmin
    • Créez une base de données nommée zoo_arcadia
    • Importez le fichier SQL situé dans /path/to/sql/
3.  Configurer le fichier db_connection.php avec vos informations MySQL :
    •$host = 'localhost';
    •$dbname = 'zoo_arcadia';
    •$username = 'root';
    •$password = '';
4.  Lancer le serveur local et accéder au site via localhost/zoo_arcadia.
