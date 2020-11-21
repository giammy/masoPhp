<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201121201255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utente (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cognome VARCHAR(255) NOT NULL, soprannome VARCHAR(255) DEFAULT NULL, indirizzo VARCHAR(255) DEFAULT NULL, citta VARCHAR(255) DEFAULT NULL, provincia VARCHAR(255) DEFAULT NULL, stato VARCHAR(255) DEFAULT NULL, codice_fiscale VARCHAR(255) DEFAULT NULL, telefono1 VARCHAR(255) DEFAULT NULL, telefono2 VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, codice_utente VARCHAR(255) NOT NULL, nota VARCHAR(1024) DEFAULT NULL, nota1 VARCHAR(1024) DEFAULT NULL, nota2 VARCHAR(1024) DEFAULT NULL, nota3 VARCHAR(1024) DEFAULT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utente');
    }
}
