-- ================================================
-- VITE & GOURMAND --- Jeu de données de test
-- ================================================

USE vite_gourmand;

-- Rôles
INSERT INTO role (libelle) VALUES
  ('visiteur'), ('utilisateur'), ('employe'), ('administrateur');

-- Thèmes
INSERT INTO theme (libelle) VALUES
  ('Noel'), ('Paques'), ('classique'), ('evenement'), ('anniversaire');

-- Régimes
INSERT INTO regime (libelle) VALUES
  ('classique'), ('vegetarien'), ('vegan'), ('sans_gluten');

-- Allergènes (14 réglementaires)
INSERT INTO allergene (libelle) VALUES
  ('Gluten'), ('Crustaces'), ('Oeufs'), ('Poissons'), ('Arachides'),
  ('Soja'), ('Lait'), ('Fruits a coque'), ('Celeri'), ('Moutarde'),
  ('Graines de sesame'), ('Sulfites'), ('Lupin'), ('Mollusques');

-- Horaires
INSERT INTO horaire (jour, heure_ouverture, heure_fermeture) VALUES
  ('Lundi','09:00','18:00'),
  ('Mardi','09:00','18:00'),
  ('Mercredi','09:00','18:00'),
  ('Jeudi','09:00','18:00'),
  ('Vendredi','09:00','18:00'),
  ('Samedi','09:00','13:00'),
  ('Dimanche', NULL, NULL);

-- Utilisateurs
INSERT INTO utilisateur (email, password, nom, prenom, gsm, adresse, ville, code_postal, actif, role_id) VALUES
  ('admin@vite-gourmand.fr','$2y$12$placeholder','Zerrouki','Admin','0600000001','1 rue Admin','Bordeaux','33000',1,4),
  ('employe@vite-gourmand.fr','$2y$12$placeholder','Martin','Julie','0600000002','2 rue Employe','Bordeaux','33000',1,3),
  ('user1@test.fr','$2y$12$placeholder','Dupont','Pierre','0600000003','3 allee Test','Bordeaux','33000',1,2),
  ('user2@test.fr','$2y$12$placeholder','Bernard','Marie','0600000004','4 place Test','Merignac','33700',1,2),
  ('user3@test.fr','$2y$12$placeholder','Leblanc','Sophie','0600000005','5 avenue Test','Pessac','33600',1,2);

-- Menus
INSERT INTO menu (titre, description, nombre_personne_minimum, prix, quantite_restante, conditions) VALUES
  ('Menu Noel Prestige','Foie gras, dinde rotie, buche chocolat artisanale',10,149.90,5,'Commander 5 jours a lavance minimum'),
  ('Menu Paques Familial','Veloute printanier, agneau roti, charlotte aux fraises',8,89.90,8,'Commander 3 jours a lavance'),
  ('Menu Vegetarien Bio','Entrees colorees, curry de legumes, dessert vegan',6,69.90,10,'Commander 3 jours a lavance'),
  ('Menu Evenement Corporate','Buffet froid, plateau fromages, desserts fins',15,199.90,3,'Commander 7 jours a lavance'),
  ('Menu Anniversaire Enfants','Mini-sandwichs, jus de fruits, gateau danniversaire',8,49.90,10,'Commander 2 jours a lavance');

-- Plats
INSERT INTO plat (nom, type) VALUES
  ('Foie gras maison','entree'),
  ('Dinde rotie aux herbes','plat'),
  ('Buche chocolat artisanale','dessert'),
  ('Veloute de poireaux','entree'),
  ('Agneau roti au romarin','plat');

-- Commandes
INSERT INTO commande (numero_commande, date_commande, date_prestation, heure_livraison, adresse_livraison, ville_livraison, nombre_personnes, prix_menu, prix_livraison, prix_total, statut, utilisateur_id, menu_id) VALUES
  ('VG-2026-001','2026-01-10','2026-12-25','12:00','3 allee Test','Bordeaux',12,179.88,0,179.88,'terminee',3,1),
  ('VG-2026-002','2026-02-15','2026-04-20','13:00','4 place Test','Merignac',10,112.38,5.50,117.88,'terminee',4,2),
  ('VG-2026-003','2026-03-01','2026-03-15','12:30','5 avenue Test','Pessac',8,93.20,8.00,101.20,'en_attente',5,3);

-- Avis
INSERT INTO avis (note, description, statut, utilisateur_id, commande_id) VALUES
  (5,'Un repas de Noel inoubliable ! La presentation etait digne dun grand restaurant.','valide',3,1),
  (4,'Service impeccable, livraison a lheure. Le menu Paques a ravi toute la famille.','valide',4,2);

-- Liaisons menus - thèmes
INSERT INTO propose (menu_id, theme_id) VALUES
  (1,1),(2,2),(3,3),(4,4),(5,5);

-- Liaisons menus - régimes
INSERT INTO adopte (menu_id, regime_id) VALUES
  (1,1),(2,1),(3,2),(3,3),(4,1),(5,1);

-- Liaisons plats - menus
INSERT INTO contient (menu_id, plat_id) VALUES
  (1,1),(1,2),(1,3),(2,4),(2,5);