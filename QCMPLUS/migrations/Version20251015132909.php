<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015132909 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, userid_id INT DEFAULT NULL, questionnaireid_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_EDBFD5EC58E0A285 (userid_id), INDEX IDX_EDBFD5EC76F9A1E5 (questionnaireid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, questionnaire_id INT DEFAULT NULL, description LONGTEXT NOT NULL, reponse1 LONGTEXT DEFAULT NULL, reponse2 LONGTEXT DEFAULT NULL, reponse3 LONGTEXT DEFAULT NULL, reponse4 LONGTEXT DEFAULT NULL, reponse5 LONGTEXT DEFAULT NULL, bonnereponse LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8ADC54D5CE07E8FF (questionnaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, historiqueid_id INT DEFAULT NULL, questionid_id INT DEFAULT NULL, reponseutilisateur LONGTEXT DEFAULT NULL, score INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5FB6DEC7A638C9AE (historiqueid_id), INDEX IDX_5FB6DEC77C8F03A3 (questionid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC58E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE historique ADD CONSTRAINT FK_EDBFD5EC76F9A1E5 FOREIGN KEY (questionnaireid_id) REFERENCES questionnaire (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5CE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaire (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A638C9AE FOREIGN KEY (historiqueid_id) REFERENCES historique (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC77C8F03A3 FOREIGN KEY (questionid_id) REFERENCES questions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC58E0A285');
        $this->addSql('ALTER TABLE historique DROP FOREIGN KEY FK_EDBFD5EC76F9A1E5');
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5CE07E8FF');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A638C9AE');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC77C8F03A3');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE reponse');
    }
}
