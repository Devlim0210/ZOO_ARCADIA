# Zoo Arcadia

### 1. Description

Zoo Arcadia est un site web interactif et écoresponsable conçu pour offrir aux visiteurs une expérience immersive dans différents habitats animaliers. Le site permet aux utilisateurs de découvrir les animaux, de laisser des avis sur leur visite, et de contacter l'équipe du zoo pour toute demande d'information. Une section spéciale est dédiée à l'administration et aux employés, leur permettant de gérer les avis des visiteurs et de mettre à jour les services offerts par le zoo. Ce projet met en avant la protection de l'environnement et l'engagement envers le bien-être animal.

### 2. Fonctionnalités

    •	Page d’accueil : Présente les services du zoo et permet aux visiteurs de découvrir les habitats et les animaux.
    •	Formulaire de contact : Les visiteurs peuvent nous contacter directement via un formulaire .
    •	Gestion des services : Les employés peuvent ajouter, modifier ou supprimer des services.
    •	Gestion des habitats : Les employés peuvent ajouter des habitats avec une description et une image associée.
    •	Gestion des avis : Les administrateurs peuvent valider ou supprimer les avis des visiteurs.
    •	Section vétérinaire : Gestion des soins et de la nourriture des animaux par les employés.
    •	Système de connexion : Authentification sécurisée pour les employés et administrateurs via des rôles définis.
    •	Système de sessions : Utilisation de sessions sécurisées pour gérer les connexions utilisateurs.

### 3.Prérequis

- **Systèmes d'exploitation** : Windows, macOS, Linux
- **Serveur local** : Xampp
- **PHP** : Version 7.4 ou plus récente
- **Base de données relationnelle** : MySQL/MariaDB/PostgreSQL
- **Base de données NoSQL** : MongoDB (si utilisée pour les consultations d'animaux)
- **Heroku CLI** : Pour déployer et gérer le projet.
- **composer** : Pour la gestion des dépendances PHP.
- **Autres** : Git,

### 4. Technologies Utilisées

- **HTML5 & CSS3** : Structure et style des pages
- **JavaScript** : Interactions dynamiques et validations de formulaire
- **PHP** : Gestion des formulaires, connexions et pages dynamiques
- **MySQL** : Gestion des avis et des utilisateurs
- **Git & GitHub** : Versionnement du projet
- **Montserrat** : Police utilisée pour le design du site.

### 5. Installation et Configuration

#### a. **Cloner le dépôt**

- Cloner le dépôt GitHub :
  • Tape cette commande dans ton terminal pour cloner le projet localement :

```bash
git clone https://github.com/Devlim0210/ZOO_ARCADIA.git
cd ZOO_ARCADIA
```

#### b. **Installer les dépendances**

```bash
composer install
```

### 6. **Structure du projet**

- **Dossier `employe/`** : Contient les scripts pour les employés.

  - `ajouter_nourriture.php` : Gérer l'ajout de nourriture pour les animaux.
  - `valider_avis.php` : Validation des avis soumis par les visiteurs.
  - `supprimer_avis.php` : Suppression des avis.
  - `employe.php` : Page principale pour les employés.

- **Pages principales** :
  - `index.php` : Page d'accueil de l'application.
  - `admin.php` : Gestion des fonctionnalités d'administration.
  - `habitats.php` : Affichage des habitats et des animaux.
  - `services.php` : Affichage des services disponibles au zoo.
  - `avis.php` : Page de gestion des avis visiteurs.
- **Fichiers de connexion et processus** :

  - `add_user.php` : Ajout d'utilisateurs (employés, vétérinaires).
  - `login.php`, `login_process.php` : Gestion de la connexion des utilisateurs.

- **Autres** :
  - `db_connection.php` : Connexion à la base de données MySQL via PDO.
  - `header.php`, `footer.php` : Templates utilisés pour maintenir la cohérence du design sur toutes les pages.
  - `styles.css`, `scripts.js` : Styles et scripts customisés.

### 7. Comptes Utilisateurs

- **Compte Administrateur** :

  - Email : `utilisateur@zooarcadia.com`
  - Mot de passe : `zoo_arcadia2K24`

- **Compte Employé** :

  - Email : `employe@zooarcadia.com`
  - Mot de passe : `employe_password` (hacher le mot de passe lors de l'initialisation)

- **Compte Vétérinaire** :
  - Email : `veterinaire@zooarcadia.com`
  - Mot de passe : `veterinaire_password` (hacher le mot de passe lors de l'initialisation)

### 8. Configuration et Déploiement de l'Application

### a. **Déploiement sur Heroku**

1. **Création de l'application sur Heroku** :

   - Crée un compte sur Heroku et installe l'interface en ligne de commande (CLI) : https://devcenter.heroku.com/articles/heroku-cli.
   - Connecte-toi à ton compte Heroku via le terminal en utilisant `heroku login`.
   - Crée une nouvelle application avec `heroku create [nom_de_ton_application]`.
   - Associe ton dépôt GitHub à ton projet Heroku avec la commande : `git push heroku main`.

2. **Configuration PostgreSQL** :

   - Heroku propose une base de données PostgreSQL par défaut. Pour configurer cette base, tu peux exécuter la commande suivante pour accéder à PostgreSQL :
     ```bash
     heroku pg:psql --app [nom_de_ton_application]
     ```
   - Dans l'interface PostgreSQL, tu pourras exécuter les commandes SQL nécessaires pour créer tes tables.
   - Exemple d'une commande pour créer la table des habitats :
     ```sql
     CREATE TABLE habitats (
         id SERIAL PRIMARY KEY,
         nom VARCHAR(255) NOT NULL,
         description TEXT NOT NULL,
         image VARCHAR(255)
     );
     ```

3. **Déploiement continu** :
   - En activant l'option de déploiement automatique sur Heroku, chaque fois que tu fais un `git push` sur ton dépôt GitHub, ton projet sera automatiquement déployé sur Heroku.
   - Pour vérifier les logs et résoudre les éventuelles erreurs, utilise :
     ```bash
     heroku logs --tail --app [nom_de_ton_application]
     ```

### b. **Lancer l'application en local**

. Base de données MySQL (local) :
• Exécute le fichier zoo_arcadia.sql pour créer les tables nécessaires.
• Configure db_connection.php avec les bonnes informations :

```bash
$host = 'localhost';
$dbname = 'zoo_arcadia';
$username = 'root';
$password = '';
```

### c. **Lancer l'application**

- Une fois que tout est déployé, tu pourras accéder à ton site via l'URL fournie par Heroku, par exemple : `https://zoo_arcadiabyftr.herokuapp.com`.
- Navigue entre les différentes pages pour tester les fonctionnalités :
  - La gestion des habitats, des services, des animaux.
  - La gestion des avis des visiteurs.
  - Les accès pour les vétérinaires et les employés.

### 7. **Sécurité**

Pour assurer la sécurité de l'application, plusieurs bonnes pratiques ont été mises en place :

- **Utilisation de PDO** : La connexion à la base de données MySQL est réalisée via PDO, ce qui permet de prévenir les attaques par injection SQL grâce à l'utilisation de requêtes préparées.
- **Gestion des erreurs** : La gestion des erreurs PDO est activée avec `ERRMODE_EXCEPTION`, ce qui permet d'attraper et de gérer les erreurs de manière appropriée sans exposer d'informations sensibles à l'utilisateur final.

### 8. **Contributeurs**

- **Nom** : RATSIMAHARISON FETRA HENINTSOA
- **Pseudo**: "Devlim0210"
