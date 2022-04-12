<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220411132652 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE callback DROP INDEX UNIQ_79F974267D0729A9, ADD INDEX IDX_79F974267D0729A9 (creneau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE callback DROP INDEX IDX_79F974267D0729A9, ADD UNIQUE INDEX UNIQ_79F974267D0729A9 (creneau_id)');
    }
}
