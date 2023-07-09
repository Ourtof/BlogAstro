<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230709114125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE testentity (id INT AUTO_INCREMENT NOT NULL, ok VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE correspondre DROP FOREIGN KEY correspondre_ibfk_1');
        $this->addSql('ALTER TABLE correspondre DROP FOREIGN KEY correspondre_ibfk_2');
        $this->addSql('ALTER TABLE illustration DROP FOREIGN KEY illustration_ibfk_1');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE correspondre');
        $this->addSql('DROP TABLE filtre');
        $this->addSql('DROP TABLE illustration');
        $this->addSql('DROP TABLE utilisateur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id_article INT NOT NULL, titre VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, contenu TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, date_article DATE NOT NULL, PRIMARY KEY(id_article)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE contact (id_contact INT NOT NULL, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, adresse_mail VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, contenu_message TEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id_contact)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE correspondre (id_article INT NOT NULL, id_filtre INT NOT NULL, INDEX id_filtre (id_filtre), INDEX IDX_2AE140C4DCA7A716 (id_article), PRIMARY KEY(id_article, id_filtre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE filtre (id_filtre INT NOT NULL, contenu VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(id_filtre)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE illustration (id_illustration INT NOT NULL, id_article INT NOT NULL, nom_fichier VARCHAR(250) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX id_article (id_article), PRIMARY KEY(id_illustration)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE utilisateur (id_utilisateur INT NOT NULL, pseudo VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, date_naissance DATE NOT NULL, adresse VARCHAR(250) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ville VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, cp INT NOT NULL, adresse_mail VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, est_admin TINYINT(1) NOT NULL, PRIMARY KEY(id_utilisateur)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE correspondre ADD CONSTRAINT correspondre_ibfk_1 FOREIGN KEY (id_article) REFERENCES article (id_article) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE correspondre ADD CONSTRAINT correspondre_ibfk_2 FOREIGN KEY (id_filtre) REFERENCES filtre (id_filtre) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE illustration ADD CONSTRAINT illustration_ibfk_1 FOREIGN KEY (id_article) REFERENCES article (id_article) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE testentity');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
