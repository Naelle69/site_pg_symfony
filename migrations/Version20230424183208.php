<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424183208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, texte LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_23A0E664B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, auteur VARCHAR(255) NOT NULL, commentaire VARCHAR(255) NOT NULL, mark INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, phone INT NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plat (id INT AUTO_INCREMENT NOT NULL, edit_id INT DEFAULT NULL, image VARCHAR(255) NOT NULL, titre VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_2038A2073EF8CFA5 (edit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, edit_id INT DEFAULT NULL, titre_back VARCHAR(255) NOT NULL, texte VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, soustitre VARCHAR(255) NOT NULL, titre_front VARCHAR(255) NOT NULL, image_front VARCHAR(255) NOT NULL, image_back VARCHAR(255) NOT NULL, INDEX IDX_49BB63903EF8CFA5 (edit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, phone INT NOT NULL, mail VARCHAR(255) NOT NULL, dirigeant VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zipcode INT NOT NULL, phone INT NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E664B89032C FOREIGN KEY (post_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A2073EF8CFA5 FOREIGN KEY (edit_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63903EF8CFA5 FOREIGN KEY (edit_id) REFERENCES restaurant (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E664B89032C');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A2073EF8CFA5');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63903EF8CFA5');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE plat');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
