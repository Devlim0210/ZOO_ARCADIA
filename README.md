# Zoo Arcadia

### 1. Description

Zoo Arcadia est un site web interactif et écoresponsable conçu pour offrir aux visiteurs une expérience immersive dans différents habitats animaliers. Le site permet aux utilisateurs de découvrir les animaux, de laisser des avis sur leur visite, et de contacter l'équipe du zoo pour toute demande d'information. Une section spéciale est dédiée à l'administration et aux employés, leur permettant de gérer les avis des visiteurs et de mettre à jour les services offerts par le zoo. Ce projet met en avant la protection de l'environnement et l'engagement envers le bien-être animal.

### 2. Fonctionnalités

- Découverte des habitats animaliers
- Formulaire de contact pour les visiteurs
- Soumission et gestion des avis des visiteurs
- Section de connexion pour l'administration et les employés
- Interface pour les employés pour valider ou supprimer des avis

### 3.Prérequis

- **Systèmes d'exploitation** : Windows, macOS, Linux
- **Serveur local** : Xampp
- **PHP** : Version 7.4 ou plus récente
- **Base de données relationnelle** : MySQL/MariaDB/PostgreSQL
- **Base de données NoSQL** : MongoDB (si utilisée pour les consultations d'animaux)
- **Autres** : Git, Node.js (si applicable)

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

Pour l’instant, aucune dépendance via Composer n’est mentionnée. Si tu ajoutes des dépendances pour MongoDB plus tard, tu pourras utiliser Composer.

#### c. **Configuration de la base de données**

1. **MySQL (ou autre base relationnelle)** :

   - Exécute le fichier SQL fourni (`zoo_arcadia.sql`) pour créer les tables nécessaires.
   - Assure-toi d'avoir configuré le fichier `db_connection.php` avec les bonnes informations (hôte, nom de la base de données, identifiant, mot de passe).
     • Exemple :
     $host = 'localhost';
    $dbname = 'zoo_arcadia';
   $username = 'root';
     $password = '';
   - Lancer le serveur local :
     • L’utilisateur doit utiliser un serveur local comme XAMPP, MAMP, ou WAMP pour exécuter le projet.
     • Après avoir démarré le serveur, il peut accéder au site en ouvrant localhost/zoo_arcadia dans son navigateur.

2. **MongoDB** :
   - Installe MongoDB et démarre le service.
   - Configure les collections pour les données non relationnelles, comme les consultations d'animaux (si applicable).

#### d. **Lancer l’application en local**

1. Place le projet dans le dossier accessible par ton serveur local (ex. `htdocs` pour XAMPP).
2. Ouvre ton navigateur et accède à l’application via `localhost/zoo_arcadia`.

### 4. **Utilisation de l’application**

- **Accès visiteur** : Navigation entre les habitats, consultation des services, et possibilité de laisser un avis.
- **Accès administrateur** : Gestion des animaux, habitats, services, et comptes.
- **Accès vétérinaire et employé** : Suivi des états des animaux, gestion des avis, alimentation des animaux.

#### Identifiants par défaut :

- **Email** : `utilisateur@zooarcadia.com`
- **Mot de passe** : `zoo_arcadia2K24`
- **Rôle** : `admin`

### 5. **Structure du projet**

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

### 6. **Déploiement sur Heroku**

Les étapes suivantes détaillent comment déployer cette application sur Heroku.

#### a. **Installer l'outil de ligne de commande Heroku**

Si tu ne l’as pas déjà, installe l’outil de ligne de commande Heroku :

```bash
npm install -g heroku
```

#### b. **Se connecter à Heroku**

Connecte-toi à ton compte Heroku depuis la ligne de commande :

```bash
heroku login
```

#### c. **Créer une application sur Heroku**

Dans le répertoire de ton projet, exécute cette commande pour créer une nouvelle application :

```bash
heroku create nom-de-ton-app
```

#### d. **Déployer l'application**

Pousse ton code vers Heroku en utilisant Git :

```bash
git add .
git commit -m "Initial commit"
git push heroku master
```

#### e. **Configurer la base de données**

Une fois le projet déployé, configure la base de données MySQL (ou autre) et MongoDB sur Heroku (cela peut être fait via l’interface de Heroku ou avec l’outil de ligne de commande).

### 7. **Sécurité**

Pour assurer la sécurité de l'application, plusieurs bonnes pratiques ont été mises en place :

- **Utilisation de PDO** : La connexion à la base de données MySQL est réalisée via PDO, ce qui permet de prévenir les attaques par injection SQL grâce à l'utilisation de requêtes préparées.

### 8. **Contributeurs**

- **Nom** : RATSIMAHARISON FETRA HENINTSOA
- **Pseudo**: "Devlim0210"

### 9. **Licence**

Non spécifiée pour le moment.
