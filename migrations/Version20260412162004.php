<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260412162004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, gsm VARCHAR(20) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, ville VARCHAR(100) DEFAULT NULL, code_postal VARCHAR(10) DEFAULT NULL, actif TINYINT NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE adopte DROP FOREIGN KEY `adopte_ibfk_1`');
        $this->addSql('ALTER TABLE adopte DROP FOREIGN KEY `adopte_ibfk_2`');
        $this->addSql('ALTER TABLE contient DROP FOREIGN KEY `contient_ibfk_1`');
        $this->addSql('ALTER TABLE contient DROP FOREIGN KEY `contient_ibfk_2`');
        $this->addSql('ALTER TABLE possede DROP FOREIGN KEY `possede_ibfk_1`');
        $this->addSql('ALTER TABLE possede DROP FOREIGN KEY `possede_ibfk_2`');
        $this->addSql('ALTER TABLE propose DROP FOREIGN KEY `propose_ibfk_1`');
        $this->addSql('ALTER TABLE propose DROP FOREIGN KEY `propose_ibfk_2`');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY `utilisateur_ibfk_1`');
        $this->addSql('DROP TABLE adopte');
        $this->addSql('DROP TABLE allergene');
        $this->addSql('DROP TABLE contient');
        $this->addSql('DROP TABLE possede');
        $this->addSql('DROP TABLE propose');
        $this->addSql('DROP TABLE regime');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE theme');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY `avis_ibfk_1`');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY `avis_ibfk_2`');
        $this->addSql('DROP INDEX commande_id ON avis');
        $this->addSql('DROP INDEX utilisateur_id ON avis');
        $this->addSql('ALTER TABLE avis MODIFY avis_id INT NOT NULL');
        $this->addSql('ALTER TABLE avis DROP utilisateur_id, DROP commande_id, CHANGE statut statut VARCHAR(20) NOT NULL, CHANGE avis_id id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY `commande_ibfk_1`');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY `commande_ibfk_2`');
        $this->addSql('DROP INDEX numero_commande ON commande');
        $this->addSql('DROP INDEX utilisateur_id ON commande');
        $this->addSql('DROP INDEX menu_id ON commande');
        $this->addSql('ALTER TABLE commande MODIFY commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande DROP utilisateur_id, DROP menu_id, CHANGE prix_livraison prix_livraison NUMERIC(10, 2) DEFAULT NULL, CHANGE statut statut VARCHAR(30) DEFAULT NULL, CHANGE motif_annulation motif_annulation LONGTEXT DEFAULT NULL, CHANGE pret_materiel pret_materiel TINYINT DEFAULT NULL, CHANGE commande_id id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE horaire MODIFY horaire_id INT NOT NULL');
        $this->addSql('ALTER TABLE horaire CHANGE horaire_id id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE menu MODIFY menu_id INT NOT NULL');
        $this->addSql('ALTER TABLE menu CHANGE description description LONGTEXT DEFAULT NULL, CHANGE nombre_personne_minimum nombre_personne_minimum INT NOT NULL, CHANGE quantite_restante quantite_restante INT DEFAULT NULL, CHANGE conditions conditions LONGTEXT DEFAULT NULL, CHANGE menu_id id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE plat MODIFY plat_id INT NOT NULL');
        $this->addSql('ALTER TABLE plat DROP photo, CHANGE type type VARCHAR(20) NOT NULL, CHANGE plat_id id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adopte (menu_id INT NOT NULL, regime_id INT NOT NULL, INDEX regime_id (regime_id), INDEX IDX_5FE70AF1CCD7E912 (menu_id), PRIMARY KEY (menu_id, regime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE allergene (allergene_id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY (allergene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contient (menu_id INT NOT NULL, plat_id INT NOT NULL, INDEX plat_id (plat_id), INDEX IDX_DC302E56CCD7E912 (menu_id), PRIMARY KEY (menu_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE possede (plat_id INT NOT NULL, allergene_id INT NOT NULL, INDEX allergene_id (allergene_id), INDEX IDX_3D0B1508D73DB560 (plat_id), PRIMARY KEY (plat_id, allergene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE propose (menu_id INT NOT NULL, theme_id INT NOT NULL, INDEX theme_id (theme_id), INDEX IDX_3DF2D060CCD7E912 (menu_id), PRIMARY KEY (menu_id, theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE regime (regime_id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY (regime_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE role (role_id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY (role_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE theme (theme_id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, PRIMARY KEY (theme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (utilisateur_id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, nom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, gsm VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, ville VARCHAR(100) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, code_postal VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_general_ci`, actif TINYINT DEFAULT 1, role_id INT NOT NULL, UNIQUE INDEX email (email), INDEX role_id (role_id), PRIMARY KEY (utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adopte ADD CONSTRAINT `adopte_ibfk_1` FOREIGN KEY (menu_id) REFERENCES menu (menu_id)');
        $this->addSql('ALTER TABLE adopte ADD CONSTRAINT `adopte_ibfk_2` FOREIGN KEY (regime_id) REFERENCES regime (regime_id)');
        $this->addSql('ALTER TABLE contient ADD CONSTRAINT `contient_ibfk_1` FOREIGN KEY (menu_id) REFERENCES menu (menu_id)');
        $this->addSql('ALTER TABLE contient ADD CONSTRAINT `contient_ibfk_2` FOREIGN KEY (plat_id) REFERENCES plat (plat_id)');
        $this->addSql('ALTER TABLE possede ADD CONSTRAINT `possede_ibfk_1` FOREIGN KEY (plat_id) REFERENCES plat (plat_id)');
        $this->addSql('ALTER TABLE possede ADD CONSTRAINT `possede_ibfk_2` FOREIGN KEY (allergene_id) REFERENCES allergene (allergene_id)');
        $this->addSql('ALTER TABLE propose ADD CONSTRAINT `propose_ibfk_1` FOREIGN KEY (menu_id) REFERENCES menu (menu_id)');
        $this->addSql('ALTER TABLE propose ADD CONSTRAINT `propose_ibfk_2` FOREIGN KEY (theme_id) REFERENCES theme (theme_id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (role_id) REFERENCES role (role_id)');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE avis MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE avis ADD utilisateur_id INT NOT NULL, ADD commande_id INT NOT NULL, CHANGE statut statut ENUM(\'en_attente\', \'valide\', \'refuse\') DEFAULT \'en_attente\', CHANGE id avis_id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (avis_id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (utilisateur_id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (commande_id) REFERENCES commande (commande_id)');
        $this->addSql('CREATE INDEX commande_id ON avis (commande_id)');
        $this->addSql('CREATE INDEX utilisateur_id ON avis (utilisateur_id)');
        $this->addSql('ALTER TABLE commande MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD utilisateur_id INT NOT NULL, ADD menu_id INT NOT NULL, CHANGE prix_livraison prix_livraison NUMERIC(10, 2) DEFAULT \'0.00\', CHANGE statut statut ENUM(\'en_attente\', \'accepte\', \'en_preparation\', \'en_livraison\', \'livre\', \'terminee\', \'annulee\') DEFAULT \'en_attente\', CHANGE motif_annulation motif_annulation TEXT DEFAULT NULL, CHANGE pret_materiel pret_materiel TINYINT DEFAULT 0, CHANGE id commande_id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (commande_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (utilisateur_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (menu_id) REFERENCES menu (menu_id)');
        $this->addSql('CREATE UNIQUE INDEX numero_commande ON commande (numero_commande)');
        $this->addSql('CREATE INDEX utilisateur_id ON commande (utilisateur_id)');
        $this->addSql('CREATE INDEX menu_id ON commande (menu_id)');
        $this->addSql('ALTER TABLE horaire MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE horaire CHANGE id horaire_id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (horaire_id)');
        $this->addSql('ALTER TABLE menu MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE menu CHANGE description description TEXT DEFAULT NULL, CHANGE nombre_personne_minimum nombre_personne_minimum INT DEFAULT 5 NOT NULL, CHANGE quantite_restante quantite_restante INT DEFAULT 10, CHANGE conditions conditions TEXT DEFAULT NULL, CHANGE id menu_id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (menu_id)');
        $this->addSql('ALTER TABLE plat MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE plat ADD photo BLOB DEFAULT NULL, CHANGE type type ENUM(\'entree\', \'plat\', \'dessert\') NOT NULL, CHANGE id plat_id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (plat_id)');
    }
}
