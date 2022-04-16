<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416115004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE instructor (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL, picture VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_31FC43DDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE learners (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, pseudo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3AB2D486A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, title VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, explication LONGTEXT NOT NULL, resource VARCHAR(255) NOT NULL, INDEX IDX_F87474F3D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, training_id INT NOT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_2D737AEFBEFD98D1 (training_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE instructor ADD CONSTRAINT FK_31FC43DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE learners ADD CONSTRAINT FK_3AB2D486A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEFBEFD98D1 FOREIGN KEY (training_id) REFERENCES training (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3D823E37A');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEFBEFD98D1');
        $this->addSql('ALTER TABLE instructor DROP FOREIGN KEY FK_31FC43DDA76ED395');
        $this->addSql('ALTER TABLE learners DROP FOREIGN KEY FK_3AB2D486A76ED395');
        $this->addSql('DROP TABLE instructor');
        $this->addSql('DROP TABLE learners');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE training');
        $this->addSql('DROP TABLE user');
    }
}
