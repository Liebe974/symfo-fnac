<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023114746 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album RENAME INDEX idx_39986e4321d25844 TO IDX_39986E43B7970CF8');
        $this->addSql('ALTER TABLE artist ADD image_name VARCHAR(255) DEFAULT NULL, ADD images VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album RENAME INDEX idx_39986e43b7970cf8 TO IDX_39986E4321D25844');
        $this->addSql('ALTER TABLE artist DROP image_name, DROP images');
    }
}
