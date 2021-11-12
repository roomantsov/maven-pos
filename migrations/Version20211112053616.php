<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112053616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE billing_address (id INT AUTO_INCREMENT NOT NULL, iso_country_code VARCHAR(10) NOT NULL, name VARCHAR(255) NOT NULL, street VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, iso_state_code VARCHAR(10) NOT NULL, postal_code VARCHAR(10) NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_request (id INT AUTO_INCREMENT NOT NULL, billing_address_id INT NOT NULL, payload_id VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_CDED26D479D0C0E4 (billing_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_request_item (id INT AUTO_INCREMENT NOT NULL, order_request_id INT NOT NULL, name VARCHAR(255) NOT NULL, price INT UNSIGNED NOT NULL, quantity INT UNSIGNED NOT NULL, INDEX IDX_647C968EF1A445F0 (order_request_id), UNIQUE INDEX order_items_idx (order_request_id, name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_request ADD CONSTRAINT FK_CDED26D479D0C0E4 FOREIGN KEY (billing_address_id) REFERENCES billing_address (id)');
        $this->addSql('ALTER TABLE order_request_item ADD CONSTRAINT FK_647C968EF1A445F0 FOREIGN KEY (order_request_id) REFERENCES order_request (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_request DROP FOREIGN KEY FK_CDED26D479D0C0E4');
        $this->addSql('ALTER TABLE order_request_item DROP FOREIGN KEY FK_647C968EF1A445F0');
        $this->addSql('DROP TABLE billing_address');
        $this->addSql('DROP TABLE order_request');
        $this->addSql('DROP TABLE order_request_item');
    }
}
