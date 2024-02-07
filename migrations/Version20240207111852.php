<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207111852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidate (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, specialite_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, cin VARCHAR(255) NOT NULL, cne VARCHAR(255) DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nationnalite VARCHAR(255) DEFAULT NULL, fonctionnaire TINYINT(1) NOT NULL, INDEX IDX_C8B28E44C54C8C93 (type_id), INDEX IDX_C8B28E442195E0F0 (specialite_id), INDEX IDX_C8B28E44BCF5E72D (categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, contact_info VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE discussion (id INT AUTO_INCREMENT NOT NULL, team_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_C0B9F90F296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (id INT AUTO_INCREMENT NOT NULL, task_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, size DOUBLE PRECISION NOT NULL, INDEX IDX_8C9F36108DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, platform VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_36AC99F1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, discussion_id INT DEFAULT NULL, sender_id INT DEFAULT NULL, recipent_id INT DEFAULT NULL, object VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, attachement VARCHAR(255) DEFAULT NULL, status INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B6BD307F1ADED311 (discussion_id), INDEX IDX_B6BD307FF624B39D (sender_id), INDEX IDX_B6BD307FBF433F1C (recipent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post (id INT AUTO_INCREMENT NOT NULL, specialite_id INT DEFAULT NULL, categorie_id INT DEFAULT NULL, session_id INT DEFAULT NULL, nbr_post INT NOT NULL, nbr_reste INT NOT NULL, INDEX IDX_5A8A6C8D2195E0F0 (specialite_id), INDEX IDX_5A8A6C8DBCF5E72D (categorie_id), INDEX IDX_5A8A6C8D613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, team_id INT DEFAULT NULL, client_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, start_date VARCHAR(255) DEFAULT NULL, dead_line VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EEA76ED395 (user_id), INDEX IDX_2FB3D0EE296CD8AE (team_id), INDEX IDX_2FB3D0EE19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_comment (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_26A5E09166D1F9C (project_id), INDEX IDX_26A5E09A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE report (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, project_id INT DEFAULT NULL, task_id INT DEFAULT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C42F7784A76ED395 (user_id), INDEX IDX_C42F7784166D1F9C (project_id), INDEX IDX_C42F77848DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, session VARCHAR(255) NOT NULL, date_fin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE specialite (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, intitule VARCHAR(255) NOT NULL, duree_formation INT NOT NULL, INDEX IDX_E7D6FCC1C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_389B783166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, project_id INT DEFAULT NULL, description LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, INDEX IDX_527EDB25A76ED395 (user_id), INDEX IDX_527EDB25166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_comment (id INT AUTO_INCREMENT NOT NULL, task_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8B9578868DB60186 (task_id), INDEX IDX_8B957886A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task_dependency (id INT AUTO_INCREMENT NOT NULL, task_id INT DEFAULT NULL, dependent_task_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_334B1EAA8DB60186 (task_id), INDEX IDX_334B1EAA8447C86E (dependent_task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, team_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, date_of_birth VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, zip_code VARCHAR(255) DEFAULT NULL, image_path VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649D60322AC (role_id), INDEX IDX_8D93D649296CD8AE (team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E442195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE discussion ADD CONSTRAINT FK_C0B9F90F296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F36108DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F1ADED311 FOREIGN KEY (discussion_id) REFERENCES discussion (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FBF433F1C FOREIGN KEY (recipent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D2195E0F0 FOREIGN KEY (specialite_id) REFERENCES specialite (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE project_comment ADD CONSTRAINT FK_26A5E09166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project_comment ADD CONSTRAINT FK_26A5E09A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F7784166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE report ADD CONSTRAINT FK_C42F77848DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE specialite ADD CONSTRAINT FK_E7D6FCC1C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE tag ADD CONSTRAINT FK_389B783166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE task_comment ADD CONSTRAINT FK_8B9578868DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task_comment ADD CONSTRAINT FK_8B957886A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE task_dependency ADD CONSTRAINT FK_334B1EAA8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE task_dependency ADD CONSTRAINT FK_334B1EAA8447C86E FOREIGN KEY (dependent_task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44C54C8C93');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E442195E0F0');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44BCF5E72D');
        $this->addSql('ALTER TABLE discussion DROP FOREIGN KEY FK_C0B9F90F296CD8AE');
        $this->addSql('ALTER TABLE file DROP FOREIGN KEY FK_8C9F36108DB60186');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1A76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F1ADED311');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FBF433F1C');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D2195E0F0');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DBCF5E72D');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D613FECDF');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE296CD8AE');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE19EB6921');
        $this->addSql('ALTER TABLE project_comment DROP FOREIGN KEY FK_26A5E09166D1F9C');
        $this->addSql('ALTER TABLE project_comment DROP FOREIGN KEY FK_26A5E09A76ED395');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784A76ED395');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F7784166D1F9C');
        $this->addSql('ALTER TABLE report DROP FOREIGN KEY FK_C42F77848DB60186');
        $this->addSql('ALTER TABLE specialite DROP FOREIGN KEY FK_E7D6FCC1C54C8C93');
        $this->addSql('ALTER TABLE tag DROP FOREIGN KEY FK_389B783166D1F9C');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25A76ED395');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25166D1F9C');
        $this->addSql('ALTER TABLE task_comment DROP FOREIGN KEY FK_8B9578868DB60186');
        $this->addSql('ALTER TABLE task_comment DROP FOREIGN KEY FK_8B957886A76ED395');
        $this->addSql('ALTER TABLE task_dependency DROP FOREIGN KEY FK_334B1EAA8DB60186');
        $this->addSql('ALTER TABLE task_dependency DROP FOREIGN KEY FK_334B1EAA8447C86E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649296CD8AE');
        $this->addSql('DROP TABLE candidate');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE discussion');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE post');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_comment');
        $this->addSql('DROP TABLE report');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE specialite');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_comment');
        $this->addSql('DROP TABLE task_dependency');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
