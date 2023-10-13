<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231013125250 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_articles ADD order_id_id INT DEFAULT NULL, ADD article_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders_articles ADD CONSTRAINT FK_78FBECAEFCDAEAAA FOREIGN KEY (order_id_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE orders_articles ADD CONSTRAINT FK_78FBECAE8F3EC46 FOREIGN KEY (article_id_id) REFERENCES articles (id)');
        $this->addSql('CREATE INDEX IDX_78FBECAEFCDAEAAA ON orders_articles (order_id_id)');
        $this->addSql('CREATE INDEX IDX_78FBECAE8F3EC46 ON orders_articles (article_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders_articles DROP FOREIGN KEY FK_78FBECAEFCDAEAAA');
        $this->addSql('ALTER TABLE orders_articles DROP FOREIGN KEY FK_78FBECAE8F3EC46');
        $this->addSql('DROP INDEX IDX_78FBECAEFCDAEAAA ON orders_articles');
        $this->addSql('DROP INDEX IDX_78FBECAE8F3EC46 ON orders_articles');
        $this->addSql('ALTER TABLE orders_articles DROP order_id_id, DROP article_id_id');
    }
}
