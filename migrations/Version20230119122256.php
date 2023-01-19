<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230119122256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pokedex (id INT AUTO_INCREMENT NOT NULL, number VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, type1 VARCHAR(255) NOT NULL, type2 VARCHAR(255) NOT NULL, total VARCHAR(255) NOT NULL, hp VARCHAR(255) NOT NULL, attack VARCHAR(255) NOT NULL, defense VARCHAR(255) NOT NULL, spatk VARCHAR(255) NOT NULL, spdef VARCHAR(255) NOT NULL, speed VARCHAR(255) NOT NULL, generation VARCHAR(255) NOT NULL, legendary VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE pokedex');
    }
}
