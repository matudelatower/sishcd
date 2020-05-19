<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200519221518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE configuracion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE configuracion (id INT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, apple_touch_icon VARCHAR(255) DEFAULT NULL, encabezado_texto_definitivo VARCHAR(255) DEFAULT NULL, escudo VARCHAR(255) DEFAULT NULL, logo16 VARCHAR(255) DEFAULT NULL, logo32 VARCHAR(255) DEFAULT NULL, logo129 VARCHAR(255) DEFAULT NULL, logo269 VARCHAR(255) DEFAULT NULL, logotipo VARCHAR(255) DEFAULT NULL, sello_presidencia VARCHAR(255) DEFAULT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_actualizacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_682CCAF1FE35D8C4 ON configuracion (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_682CCAF1F6167A1C ON configuracion (actualizado_por_id)');
        $this->addSql('ALTER TABLE configuracion ADD CONSTRAINT FK_682CCAF1FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE configuracion ADD CONSTRAINT FK_682CCAF1F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE configuracion_id_seq CASCADE');
        $this->addSql('DROP TABLE configuracion');
    }
}
