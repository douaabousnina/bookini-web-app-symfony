<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529140136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book MODIFY book_id INT AUTO_INCREMENT NOT NULL');
        // $this->addSql('ALTER TABLE book DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE book ADD book_description VARCHAR(255) NOT NULL');
        // $this->addSql('ALTER TABLE book ADD PRIMARY KEY (book_id)');
        $this->addSql('ALTER TABLE user MODIFY user_id INT AUTO_INCREMENT NOT NULL');
        // $this->addSql('ALTER TABLE user DROP PRIMARY KEY');
        // $this->addSql('ALTER TABLE user ADD PRIMARY KEY (user_id)');
    }


    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE book MODIFY book_id INT NOT NULL');
        $this->addSql('ALTER TABLE book DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE book DROP book_description');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (book_id)');
        $this->addSql('ALTER TABLE user MODIFY user_id INT NOT NULL');
        $this->addSql('ALTER TABLE user DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (user_id)');
    }
}
