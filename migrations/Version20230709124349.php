<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709124349 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, contenu LONGTEXT NOT NULL, date_article DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article_filtre (article_id INT NOT NULL, filtre_id INT NOT NULL, INDEX IDX_9353C9CC7294869C (article_id), INDEX IDX_9353C9CCCC9B96EA (filtre_id), PRIMARY KEY(article_id, filtre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, id_contact INT NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, adresse_mail VARCHAR(255) NOT NULL, contenu_message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filtre (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE filtre_article (filtre_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_B879CC2ACC9B96EA (filtre_id), INDEX IDX_B879CC2A7294869C (article_id), PRIMARY KEY(filtre_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE illustration (id INT AUTO_INCREMENT NOT NULL, article_id_id INT DEFAULT NULL, id_illustration INT NOT NULL, nom_fichier VARCHAR(255) NOT NULL, id_article INT NOT NULL, INDEX IDX_D67B9A428F3EC46 (article_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, id_utilisateur INT NOT NULL, pseudo VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, date_naissance DATE NOT NULL, adresse VARCHAR(255) NOT NULL, ville VARCHAR(50) NOT NULL, code_postal INT NOT NULL, adresse_mail VARCHAR(100) NOT NULL, mot_de_passe VARCHAR(50) NOT NULL, est_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article_filtre ADD CONSTRAINT FK_9353C9CC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_filtre ADD CONSTRAINT FK_9353C9CCCC9B96EA FOREIGN KEY (filtre_id) REFERENCES filtre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filtre_article ADD CONSTRAINT FK_B879CC2ACC9B96EA FOREIGN KEY (filtre_id) REFERENCES filtre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filtre_article ADD CONSTRAINT FK_B879CC2A7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT FK_D67B9A428F3EC46 FOREIGN KEY (article_id_id) REFERENCES article (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_filtre DROP FOREIGN KEY FK_9353C9CC7294869C');
        $this->addSql('ALTER TABLE article_filtre DROP FOREIGN KEY FK_9353C9CCCC9B96EA');
        $this->addSql('ALTER TABLE filtre_article DROP FOREIGN KEY FK_B879CC2ACC9B96EA');
        $this->addSql('ALTER TABLE filtre_article DROP FOREIGN KEY FK_B879CC2A7294869C');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY FK_D67B9A428F3EC46');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_filtre');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE filtre');
        $this->addSql('DROP TABLE filtre_article');
        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE utilisateur');
    }
}
