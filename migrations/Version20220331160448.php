<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220331160448 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE callback ADD creneau_id INT NOT NULL, ADD moment_id INT NOT NULL');
        $this->addSql('ALTER TABLE callback ADD CONSTRAINT FK_79F974267D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id)');
        $this->addSql('ALTER TABLE callback ADD CONSTRAINT FK_79F97426ABE99143 FOREIGN KEY (moment_id) REFERENCES creneau (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_79F974267D0729A9 ON callback (creneau_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_79F97426ABE99143 ON callback (moment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE callback DROP FOREIGN KEY FK_79F974267D0729A9');
        $this->addSql('ALTER TABLE callback DROP FOREIGN KEY FK_79F97426ABE99143');
        $this->addSql('DROP INDEX UNIQ_79F974267D0729A9 ON callback');
        $this->addSql('DROP INDEX UNIQ_79F97426ABE99143 ON callback');
        $this->addSql('ALTER TABLE callback DROP creneau_id, DROP moment_id');
    }
}
