<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202124609 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, telefono VARCHAR(255) NOT NULL, borrado TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugadores (id INT AUTO_INCREMENT NOT NULL, club_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_CF491B7661190A32 (club_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jugadores ADD CONSTRAINT FK_CF491B7661190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jugadores DROP FOREIGN KEY FK_CF491B7661190A32');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE jugadores');
    }
}
