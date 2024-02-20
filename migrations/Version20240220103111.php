<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220103111 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD intitule_html VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE specialite CHANGE intitule_html intitule_html VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP intitule_html');
        $this->addSql('ALTER TABLE specialite CHANGE intitule_html intitule_html VARCHAR(255) DEFAULT NULL');
    }
}
