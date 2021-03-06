<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220426004329 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY fk_type');
        $this->addSql('ALTER TABLE competition CHANGE type type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB18CDE5729 FOREIGN KEY (type) REFERENCES type (nom_type)');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY fk_facture');
        $this->addSql('ALTER TABLE facture CHANGE idFacture idFacture INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410EE3F0FE2 FOREIGN KEY (idFacture) REFERENCES pan (id_panier)');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY fk_equipe');
        $this->addSql('ALTER TABLE joueur CHANGE nom_equipe nom_equipe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT FK_FD71A9C5A4862542 FOREIGN KEY (nom_equipe) REFERENCES equipe (nom_equipe)');
        $this->addSql('ALTER TABLE matchh CHANGE Id_match Id_match INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE pan DROP FOREIGN KEY fk_user');
        $this->addSql('ALTER TABLE pan CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pan ADD CONSTRAINT FK_7D5CA7FB6B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE reduction DROP FOREIGN KEY fk12');
        $this->addSql('ALTER TABLE reduction CHANGE id_user id_user INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reduction ADD CONSTRAINT FK_B1E754686B3CA4B FOREIGN KEY (id_user) REFERENCES user (id_user)');
        $this->addSql('ALTER TABLE stat_joueur DROP FOREIGN KEY fk_comp');
        $this->addSql('ALTER TABLE stat_joueur DROP FOREIGN KEY fk_joueur');
        $this->addSql('ALTER TABLE stat_joueur CHANGE nom_joueur nom_joueur VARCHAR(255) DEFAULT NULL, CHANGE nom_comp nom_comp VARCHAR(255) DEFAULT NULL, CHANGE but_comp but_comp INT DEFAULT NULL, CHANGE assist_comp assist_comp INT DEFAULT NULL, CHANGE but_total but_total INT NOT NULL, CHANGE assist_total assist_total INT NOT NULL');
        $this->addSql('ALTER TABLE stat_joueur ADD CONSTRAINT FK_9C93B4939DAA554 FOREIGN KEY (nom_comp) REFERENCES competition (nom_comp)');
        $this->addSql('ALTER TABLE stat_joueur ADD CONSTRAINT FK_9C93B497DBE3692 FOREIGN KEY (nom_joueur) REFERENCES joueur (nom_joueur)');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY fk_match');
        $this->addSql('ALTER TABLE statistique CHANGE Id_match Id_match INT DEFAULT NULL');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038AD6DA8E663 FOREIGN KEY (Id_match) REFERENCES matchh (Id_match)');
        $this->addSql('ALTER TABLE stats_comp DROP FOREIGN KEY fk_com');
        $this->addSql('ALTER TABLE stats_comp DROP FOREIGN KEY fk_equi');
        $this->addSql('ALTER TABLE stats_comp CHANGE competition competition VARCHAR(255) DEFAULT NULL, CHANGE equipe equipe VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE stats_comp ADD CONSTRAINT FK_8A66077AB50A2CB1 FOREIGN KEY (competition) REFERENCES competition (nom_comp)');
        $this->addSql('ALTER TABLE stats_comp ADD CONSTRAINT FK_8A66077A2449BA15 FOREIGN KEY (equipe) REFERENCES equipe (nom_equipe)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB18CDE5729');
        $this->addSql('ALTER TABLE competition CHANGE type type VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT fk_type FOREIGN KEY (type) REFERENCES type (nom_type) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410EE3F0FE2');
        $this->addSql('ALTER TABLE facture CHANGE idFacture idFacture INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT fk_facture FOREIGN KEY (idFacture) REFERENCES pan (id_panier) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE joueur DROP FOREIGN KEY FK_FD71A9C5A4862542');
        $this->addSql('ALTER TABLE joueur CHANGE nom_equipe nom_equipe VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE joueur ADD CONSTRAINT fk_equipe FOREIGN KEY (nom_equipe) REFERENCES equipe (nom_equipe) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matchh CHANGE Id_match Id_match INT NOT NULL');
        $this->addSql('ALTER TABLE pan DROP FOREIGN KEY FK_7D5CA7FB6B3CA4B');
        $this->addSql('ALTER TABLE pan CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE pan ADD CONSTRAINT fk_user FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reduction DROP FOREIGN KEY FK_B1E754686B3CA4B');
        $this->addSql('ALTER TABLE reduction CHANGE id_user id_user INT NOT NULL');
        $this->addSql('ALTER TABLE reduction ADD CONSTRAINT fk12 FOREIGN KEY (id_user) REFERENCES user (id_user) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_joueur DROP FOREIGN KEY FK_9C93B4939DAA554');
        $this->addSql('ALTER TABLE stat_joueur DROP FOREIGN KEY FK_9C93B497DBE3692');
        $this->addSql('ALTER TABLE stat_joueur CHANGE nom_comp nom_comp VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE nom_joueur nom_joueur VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE but_comp but_comp INT DEFAULT 0, CHANGE assist_comp assist_comp INT DEFAULT 0, CHANGE but_total but_total INT DEFAULT 0 NOT NULL, CHANGE assist_total assist_total INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE stat_joueur ADD CONSTRAINT fk_comp FOREIGN KEY (nom_comp) REFERENCES competition (nom_comp) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stat_joueur ADD CONSTRAINT fk_joueur FOREIGN KEY (nom_joueur) REFERENCES joueur (nom_joueur) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038AD6DA8E663');
        $this->addSql('ALTER TABLE statistique CHANGE Id_match Id_match INT NOT NULL');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT fk_match FOREIGN KEY (Id_match) REFERENCES matchh (Id_match) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats_comp DROP FOREIGN KEY FK_8A66077AB50A2CB1');
        $this->addSql('ALTER TABLE stats_comp DROP FOREIGN KEY FK_8A66077A2449BA15');
        $this->addSql('ALTER TABLE stats_comp CHANGE competition competition VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE equipe equipe VARCHAR(255) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE stats_comp ADD CONSTRAINT fk_com FOREIGN KEY (competition) REFERENCES competition (nom_comp) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stats_comp ADD CONSTRAINT fk_equi FOREIGN KEY (equipe) REFERENCES equipe (nom_equipe) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
