<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240528143216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_book');
        $this->addSql('ALTER TABLE `order` MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON `order`');
        $this->addSql('ALTER TABLE `order` CHANGE id order_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD PRIMARY KEY (order_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_book (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `order` MODIFY order_id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON `order`');
        $this->addSql('ALTER TABLE `order` CHANGE order_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD PRIMARY KEY (id)');
    }
}
