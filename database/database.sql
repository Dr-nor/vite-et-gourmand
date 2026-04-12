-- ================================================
-- VITE & GOURMAND --- Base de données
-- Écrit à la main --- pas de dump Doctrine !
-- ================================================

CREATE DATABASE IF NOT EXISTS vite_gourmand
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE vite_gourmand;

-- ------- ÉTAPE 1 : Tables sans FK (référence) -------

CREATE TABLE role (
  role_id INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(50) NOT NULL
);

CREATE TABLE theme (
  theme_id INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(50) NOT NULL
);

CREATE TABLE regime (
  regime_id INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(50) NOT NULL
);

CREATE TABLE allergene (
  allergene_id INT AUTO_INCREMENT PRIMARY KEY,
  libelle VARCHAR(50) NOT NULL
);

CREATE TABLE horaire (
  horaire_id INT AUTO_INCREMENT PRIMARY KEY,
  jour VARCHAR(20) NOT NULL,
  heure_ouverture VARCHAR(10),
  heure_fermeture VARCHAR(10)
);

-- ------- ÉTAPE 2 : Tables principales -------

CREATE TABLE utilisateur (
  utilisateur_id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(180) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  nom VARCHAR(100) NOT NULL,
  prenom VARCHAR(100) NOT NULL,
  gsm VARCHAR(20),
  adresse VARCHAR(255),
  ville VARCHAR(100),
  code_postal VARCHAR(10),
  actif TINYINT(1) DEFAULT 1,
  role_id INT NOT NULL,
  FOREIGN KEY (role_id) REFERENCES role(role_id)
);

CREATE TABLE menu (
  menu_id INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(100) NOT NULL,
  description TEXT,
  nombre_personne_minimum INT NOT NULL DEFAULT 5,
  prix DECIMAL(10,2) NOT NULL,
  quantite_restante INT DEFAULT 10,
  conditions TEXT
);

CREATE TABLE plat (
  plat_id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(100) NOT NULL,
  type ENUM('entree','plat','dessert') NOT NULL,
  photo BLOB
);

-- ------- ÉTAPE 3 : Tables avec FK -------

CREATE TABLE commande (
  commande_id INT AUTO_INCREMENT PRIMARY KEY,
  numero_commande VARCHAR(30) NOT NULL UNIQUE,
  date_commande DATE NOT NULL,
  date_prestation DATE NOT NULL,
  heure_livraison VARCHAR(10),
  adresse_livraison VARCHAR(255),
  ville_livraison VARCHAR(100),
  nombre_personnes INT NOT NULL,
  prix_menu DECIMAL(10,2) NOT NULL,
  prix_livraison DECIMAL(10,2) DEFAULT 0,
  prix_total DECIMAL(10,2) NOT NULL,
  statut ENUM('en_attente','accepte','en_preparation','en_livraison','livre','terminee','annulee') DEFAULT 'en_attente',
  motif_annulation TEXT,
  pret_materiel TINYINT(1) DEFAULT 0,
  utilisateur_id INT NOT NULL,
  menu_id INT NOT NULL,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
  FOREIGN KEY (menu_id) REFERENCES menu(menu_id)
);

CREATE TABLE avis (
  avis_id INT AUTO_INCREMENT PRIMARY KEY,
  note INT NOT NULL CHECK (note BETWEEN 1 AND 5),
  description VARCHAR(500),
  statut ENUM('en_attente','valide','refuse') DEFAULT 'en_attente',
  utilisateur_id INT NOT NULL,
  commande_id INT NOT NULL,
  FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(utilisateur_id),
  FOREIGN KEY (commande_id) REFERENCES commande(commande_id)
);

-- ------- ÉTAPE 4 : Tables de liaison (Many-to-Many) -------

CREATE TABLE propose (
  menu_id INT,
  theme_id INT,
  PRIMARY KEY (menu_id, theme_id),
  FOREIGN KEY (menu_id) REFERENCES menu(menu_id),
  FOREIGN KEY (theme_id) REFERENCES theme(theme_id)
);

CREATE TABLE adopte (
  menu_id INT,
  regime_id INT,
  PRIMARY KEY (menu_id, regime_id),
  FOREIGN KEY (menu_id) REFERENCES menu(menu_id),
  FOREIGN KEY (regime_id) REFERENCES regime(regime_id)
);

CREATE TABLE contient (
  menu_id INT,
  plat_id INT,
  PRIMARY KEY (menu_id, plat_id),
  FOREIGN KEY (menu_id) REFERENCES menu(menu_id),
  FOREIGN KEY (plat_id) REFERENCES plat(plat_id)
);

CREATE TABLE possede (
  plat_id INT,
  allergene_id INT,
  PRIMARY KEY (plat_id, allergene_id),
  FOREIGN KEY (plat_id) REFERENCES plat(plat_id),
  FOREIGN KEY (allergene_id) REFERENCES allergene(allergene_id)
);