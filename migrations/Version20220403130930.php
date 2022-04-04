<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220403130930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau ADD moment_id INT NOT NULL');
        $this->addSql('ALTER TABLE creneau ADD CONSTRAINT FK_F9668B5FABE99143 FOREIGN KEY (moment_id) REFERENCES moment (id)');
        $this->addSql('CREATE INDEX IDX_F9668B5FABE99143 ON creneau (moment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau DROP FOREIGN KEY FK_F9668B5FABE99143');
        $this->addSql('DROP INDEX IDX_F9668B5FABE99143 ON creneau');
        $this->addSql('ALTER TABLE creneau DROP moment_id');
    }
}
