<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210202124358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE3872900BE3B3');
        $this->addSql('DROP INDEX IDX_B8EE3872900BE3B3 ON club');
        $this->addSql('ALTER TABLE club DROP jugadores_id');
        $this->addSql('ALTER TABLE jugadores ADD club_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jugadores ADD CONSTRAINT FK_CF491B7661190A32 FOREIGN KEY (club_id) REFERENCES club (id)');
        $this->addSql('CREATE INDEX IDX_CF491B7661190A32 ON jugadores (club_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club ADD jugadores_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE3872900BE3B3 FOREIGN KEY (jugadores_id) REFERENCES jugadores (id)');
        $this->addSql('CREATE INDEX IDX_B8EE3872900BE3B3 ON club (jugadores_id)');
        $this->addSql('ALTER TABLE jugadores DROP FOREIGN KEY FK_CF491B7661190A32');
        $this->addSql('DROP INDEX IDX_CF491B7661190A32 ON jugadores');
        $this->addSql('ALTER TABLE jugadores DROP club_id');
    }
}
