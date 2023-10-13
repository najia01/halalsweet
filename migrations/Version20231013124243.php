<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013124243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE orders_articles (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE8F3EC46');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEFCDAEAAA');
        $this->addSql('DROP INDEX IDX_E52FFDEEFCDAEAAA ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEE8F3EC46 ON orders');
        $this->addSql('ALTER TABLE orders DROP order_id_id, DROP article_id_id');
        $this->addSql('ALTER TABLE users ADD is_verified TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE orders_articles');
        $this->addSql('ALTER TABLE orders ADD order_id_id INT DEFAULT NULL, ADD article_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE8F3EC46 FOREIGN KEY (article_id_id) REFERENCES articles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEFCDAEAAA FOREIGN KEY (order_id_id) REFERENCES articles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E52FFDEEFCDAEAAA ON orders (order_id_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE8F3EC46 ON orders (article_id_id)');
        $this->addSql('ALTER TABLE users DROP is_verified');
    }
}
