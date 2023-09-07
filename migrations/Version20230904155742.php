<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230904155742 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adress ADD id INT AUTO_INCREMENT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD firstname VARCHAR(255) NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD compagny VARCHAR(255) DEFAULT NULL, ADD address VARCHAR(255) NOT NULL, ADD postal VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD country VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adress MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON adress');
        $this->addSql('ALTER TABLE adress DROP id, DROP name, DROP firstname, DROP lastname, DROP compagny, DROP address, DROP postal, DROP city, DROP country, DROP phone');
    }
}
