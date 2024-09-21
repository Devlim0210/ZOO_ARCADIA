-- Table structure for table `animaux`
--

DROP TABLE IF EXISTS animaux;
CREATE TABLE animaux (
  id SERIAL PRIMARY KEY,
  prenom VARCHAR(255),
  race VARCHAR(255),
  age INT,
  sexe VARCHAR(10),
  date_arrivee DATE
);

--
-- Dumping data for table `animaux`
INSERT INTO animaux (prenom, race, age, sexe, date_arrivee) VALUES 
('Éléphant','Mammifère',NULL,NULL,NULL),
('Lion','Mammifère',NULL,NULL,NULL),
('Serpent','Reptile',NULL,NULL,NULL);


-- Table structure for table `avis`
DROP TABLE IF EXISTS avis;
CREATE TABLE avis (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  message TEXT NOT NULL,
  date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  valide BOOLEAN DEFAULT FALSE
);

-- Dumping data for table `avis`
INSERT INTO avis (id, nom, email, message, date, valide) VALUES 
(1,'kamkam','ericka.sab94@gmail.com','eeeeeeeee','2024-09-10 19:23:24', TRUE),
(2,'g','ftr.henintsoa@gmail.com','hihih','2024-09-11 21:07:44', TRUE),
(3,'g','ftr.henintsoa@gmail.com','hihih','2024-09-11 21:36:54', TRUE),
(5,'eleonore','eleonore@gmail.com','Ras','2024-09-18 07:35:38', TRUE);

-- Table structure for table `consultations`
DROP TABLE IF EXISTS consultations;

CREATE TABLE consultations (
  id SERIAL PRIMARY KEY,
  animal_id INT,
  consultation_date DATE,
  etat_animal VARCHAR(255),
  details TEXT,
  CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES animaux (id)
);

INSERT INTO consultations (id, animal_id, consultation_date, etat_animal, details) 
VALUES (1, 2, '2024-08-28', 'malade', 'ras');

-- Table structure for table `contact`
DROP TABLE IF EXISTS contact;

CREATE TABLE contact (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  message TEXT NOT NULL,
  date_contact TIMESTAMP DEFAULT current_timestamp
);

INSERT INTO contact (id, nom, email, message, date_contact) 
VALUES 
(1, 'yasmine', 'yasmine@gmail.com', 'bonjour je voudrais avoir quelques details concernant le petit train?', '2024-09-18 10:45:10'),
(2, 'yas', 'yasmine@gmail.com', 'hello', '2024-09-18 11:58:13');


-- Table structure for table `nourriture`
DROP TABLE IF EXISTS nourriture;

CREATE TABLE nourriture (
  id SERIAL PRIMARY KEY,
  animal_id INT,
  type_nourriture VARCHAR(255),
  quantite INT,
  date_heure TIMESTAMP,
  CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES animaux (id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Table structure for table `services`
DROP TABLE IF EXISTS services;

CREATE TABLE services (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(255) NOT NULL,
  description TEXT NOT NULL
);

INSERT INTO services (id, nom, description) VALUES 
(2, 'Restauration', 'Découvrez notre offre de restauration bio et locale, avec des options végétariennes et véganes.'),
(3, 'Visite guidée', 'Explorez le zoo avec nos guides experts et apprenez-en plus sur les animaux et leurs habitats.'),
(4, 'Petit train', 'Faites le tour du zoo sans effort grâce à notre petit train, idéal pour découvrir les animaux tout en se relaxant.');


-- Table structure for table `users`
DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role VARCHAR(50) NOT NULL,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users (id, nom, email, password, role, date_creation) VALUES 
(1,'Administrateur','utilisateur@zooarcadia.com','$2y$10$YwA5zmf5U8TsRbcq3LHehecpwZEw4pbO4XQIAEqyKMr02sy3OW4Ni','admin','2024-09-18 09:15:04'),
(2,'Employé','employe@zooarcadia.com','$2y$10$PZY.d7FIAVJAshaNK8JKH.o8Z.2p8IYWWZUchUFrh16gmqgnHj6Ui','employé','2024-09-19 19:56:01'),
(3,'Vétérinaire','veterinaire@zooarcadia.com','$2y$10$KLQuy0YuscGhNzWszP7Y7e2LqVcIGE05FOI2k0AH07njF7vAJzFhm','vétérinaire','2024-09-19 19:56:01'),
(4,'meydon','meydon@gmail.com','$2y$10$vnGmNf4AMZFLrfaqvNaXmeF5M36GdTUD23h8MHvlFFPV6gmAlPMQe','employe','2024-09-20 16:47:23'),
(5,'Samyok','samyok@gmail.com','$2y$10$6Sl83ErcFwilxlY/WlJdH.4Jb8Oxueddag.y.Ruy4tU8klX164/mO','veterinaire','2024-09-20 17:10:58');