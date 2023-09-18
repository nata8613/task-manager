<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230916150638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "task" (id INT NOT NULL, assignee_id INT DEFAULT NULL, creator_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, due_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, priority VARCHAR(255) DEFAULT NULL, type VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, category VARCHAR(255) DEFAULT NULL, tags JSON NOT NULL, estimated_time VARCHAR(255) DEFAULT NULL, time_spent_on_task VARCHAR(255) DEFAULT NULL, follow BOOLEAN NOT NULL, unread BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_527EDB2559EC7D60 ON "task" (assignee_id)');
        $this->addSql('CREATE INDEX IDX_527EDB2561220EA6 ON "task" (creator_id)');
        $this->addSql('ALTER TABLE "task" ADD CONSTRAINT FK_527EDB2559EC7D60 FOREIGN KEY (assignee_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "task" ADD CONSTRAINT FK_527EDB2561220EA6 FOREIGN KEY (creator_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "task" DROP CONSTRAINT FK_527EDB2559EC7D60');
        $this->addSql('ALTER TABLE "task" DROP CONSTRAINT FK_527EDB2561220EA6');
        $this->addSql('DROP TABLE "task"');
    }
}
