<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008130026 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE comments_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, commenter_id INT DEFAULT NULL, media_id INT NOT NULL, parent_comment_id INT DEFAULT NULL, content TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526CB4D5A9E2 ON comment (commenter_id)');
        $this->addSql('CREATE INDEX IDX_9474526CEA9FDD75 ON comment (media_id)');
        $this->addSql('CREATE INDEX IDX_9474526CBF2AF943 ON comment (parent_comment_id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB4D5A9E2 FOREIGN KEY (commenter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CBF2AF943 FOREIGN KEY (parent_comment_id) REFERENCES comment (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT fk_5f9e962ab4d5a9e2');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT fk_5f9e962aea9fdd75');
        $this->addSql('ALTER TABLE comments DROP CONSTRAINT fk_5f9e962aedfe3281');
        $this->addSql('DROP TABLE comments');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE comments_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comments (id INT NOT NULL, commenter_id INT DEFAULT NULL, media_id INT NOT NULL, children_comments_id INT DEFAULT NULL, content TEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_5f9e962aedfe3281 ON comments (children_comments_id)');
        $this->addSql('CREATE INDEX idx_5f9e962aea9fdd75 ON comments (media_id)');
        $this->addSql('CREATE INDEX idx_5f9e962ab4d5a9e2 ON comments (commenter_id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT fk_5f9e962ab4d5a9e2 FOREIGN KEY (commenter_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT fk_5f9e962aea9fdd75 FOREIGN KEY (media_id) REFERENCES media (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT fk_5f9e962aedfe3281 FOREIGN KEY (children_comments_id) REFERENCES comments (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CB4D5A9E2');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CEA9FDD75');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CBF2AF943');
        $this->addSql('DROP TABLE comment');
    }
}
