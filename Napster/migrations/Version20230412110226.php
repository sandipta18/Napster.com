<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412110226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, email_id INT NOT NULL, post_time VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, display VARCHAR(255) DEFAULT NULL, video VARCHAR(255) DEFAULT NULL, audio VARCHAR(255) DEFAULT NULL, INDEX IDX_885DBAFAA832C1C9 (email_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE posts ADD CONSTRAINT FK_885DBAFAA832C1C9 FOREIGN KEY (email_id) REFERENCES test (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE posts DROP FOREIGN KEY FK_885DBAFAA832C1C9');
        $this->addSql('DROP TABLE posts');
    }
}
