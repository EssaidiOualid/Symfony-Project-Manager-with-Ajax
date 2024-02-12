<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240209150043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate ADD nom_ar VARCHAR(20) DEFAULT NULL, ADD prenom_ar VARCHAR(20) DEFAULT NULL, ADD sexe VARCHAR(1) DEFAULT NULL, ADD date_naissance VARCHAR(20) DEFAULT NULL, ADD liau_naissance VARCHAR(20) DEFAULT NULL, ADD telephone VARCHAR(20) DEFAULT NULL, ADD email VARCHAR(20) DEFAULT NULL, ADD etablissement VARCHAR(20) DEFAULT NULL, ADD statut VARCHAR(20) DEFAULT NULL, ADD specialite VARCHAR(20) DEFAULT NULL, ADD pst_chu VARCHAR(20) DEFAULT NULL, ADD date_soutenance VARCHAR(20) DEFAULT NULL, ADD num_doc VARCHAR(20) DEFAULT NULL, ADD date_inscription VARCHAR(20) DEFAULT NULL, ADD valide VARCHAR(5) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP nom_ar, DROP prenom_ar, DROP sexe, DROP date_naissance, DROP liau_naissance, DROP telephone, DROP email, DROP etablissement, DROP statut, DROP specialite, DROP pst_chu, DROP date_soutenance, DROP num_doc, DROP date_inscription, DROP valide');
    }
}
