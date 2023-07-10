<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230710162256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article_filtre DROP FOREIGN KEY FK_9353C9CC7294869C');
        $this->addSql('ALTER TABLE article_filtre DROP FOREIGN KEY FK_9353C9CCCC9B96EA');
        $this->addSql('ALTER TABLE filtre_article DROP FOREIGN KEY FK_B879CC2A7294869C');
        $this->addSql('ALTER TABLE filtre_article DROP FOREIGN KEY FK_B879CC2ACC9B96EA');
        $this->addSql('DROP TABLE article_filtre');
        $this->addSql('DROP TABLE filtre');
        $this->addSql('DROP TABLE filtre_article');
        $this->addSql('ALTER TABLE article ADD tag VARCHAR(100) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article_filtre (article_id INT NOT NULL, filtre_id INT NOT NULL, INDEX IDX_9353C9CC7294869C (article_id), INDEX IDX_9353C9CCCC9B96EA (filtre_id), PRIMARY KEY(article_id, filtre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE filtre (id INT AUTO_INCREMENT NOT NULL, contenu VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE filtre_article (filtre_id INT NOT NULL, article_id INT NOT NULL, INDEX IDX_B879CC2ACC9B96EA (filtre_id), INDEX IDX_B879CC2A7294869C (article_id), PRIMARY KEY(filtre_id, article_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE article_filtre ADD CONSTRAINT FK_9353C9CC7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article_filtre ADD CONSTRAINT FK_9353C9CCCC9B96EA FOREIGN KEY (filtre_id) REFERENCES filtre (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filtre_article ADD CONSTRAINT FK_B879CC2A7294869C FOREIGN KEY (article_id) REFERENCES article (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE filtre_article ADD CONSTRAINT FK_B879CC2ACC9B96EA FOREIGN KEY (filtre_id) REFERENCES filtre (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE article DROP tag');
    }
}
