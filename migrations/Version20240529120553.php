<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240529120553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_book (order_id_id INT NOT NULL, book_id_id INT NOT NULL, quantity INT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_86149926FCDAEAAA (order_id_id), INDEX IDX_8614992671868B2E (book_id_id), PRIMARY KEY(order_id_id, book_id_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_86149926FCDAEAAA FOREIGN KEY (order_id_id) REFERENCES `order` (id)');
        $this->addSql('ALTER TABLE order_book ADD CONSTRAINT FK_8614992671868B2E FOREIGN KEY (book_id_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE book MODIFY book_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON book');
        $this->addSql('ALTER TABLE book ADD book_description VARCHAR(255) NOT NULL, CHANGE book_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE `order` ADD user_id_id INT NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F52993989D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F52993989D86650F ON `order` (user_id_id)');
        $this->addSql('ALTER TABLE user MODIFY user_id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON user');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USER_ID ON user');
        $this->addSql('ALTER TABLE user CHANGE user_id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USER_ID ON user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_86149926FCDAEAAA');
        $this->addSql('ALTER TABLE order_book DROP FOREIGN KEY FK_8614992671868B2E');
        $this->addSql('DROP TABLE order_book');
        $this->addSql('ALTER TABLE book MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON book');
        $this->addSql('ALTER TABLE book DROP book_description, CHANGE id book_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE book ADD PRIMARY KEY (book_id)');
        $this->addSql('ALTER TABLE `order` MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F52993989D86650F');
        $this->addSql('DROP INDEX IDX_F52993989D86650F ON `order`');
        $this->addSql('DROP INDEX `primary` ON `order`');
        $this->addSql('ALTER TABLE `order` DROP user_id_id, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE user MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON user');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_USER_ID ON user');
        $this->addSql('ALTER TABLE user CHANGE id user_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE user ADD PRIMARY KEY (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USER_ID ON user (user_id)');
    }
}
