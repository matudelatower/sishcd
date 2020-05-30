<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200530190118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE aprobado_en_sesion_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE rama_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE texto_definitivo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE anexo_texto_definitivo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE texto_definitivo_expediente_adjunto_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE aprobado_en_sesion (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE rama (id INT NOT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, titulo VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, color_letra VARCHAR(255) DEFAULT NULL, especial BOOLEAN DEFAULT NULL, numero_romano VARCHAR(255) NOT NULL, orden INT DEFAULT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_actualizacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_43815238FE35D8C4 ON rama (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_43815238F6167A1C ON rama (actualizado_por_id)');
        $this->addSql('CREATE TABLE texto_definitivo (id INT NOT NULL, dictamen_id INT DEFAULT NULL, rama_id INT DEFAULT NULL, sesion_id INT DEFAULT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, texto TEXT NOT NULL, numero VARCHAR(255) DEFAULT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_actualizacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E313F079610C661D ON texto_definitivo (dictamen_id)');
        $this->addSql('CREATE INDEX IDX_E313F0795E0BFD3B ON texto_definitivo (rama_id)');
        $this->addSql('CREATE INDEX IDX_E313F0791CCCADCB ON texto_definitivo (sesion_id)');
        $this->addSql('CREATE INDEX IDX_E313F079FE35D8C4 ON texto_definitivo (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_E313F079F6167A1C ON texto_definitivo (actualizado_por_id)');
        $this->addSql('CREATE TABLE anexo_texto_definitivo (id INT NOT NULL, texto_definitivo_id INT DEFAULT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL, anexo VARCHAR(255) DEFAULT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_actualizacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AA5E8444AD63366F ON anexo_texto_definitivo (texto_definitivo_id)');
        $this->addSql('CREATE INDEX IDX_AA5E8444FE35D8C4 ON anexo_texto_definitivo (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_AA5E8444F6167A1C ON anexo_texto_definitivo (actualizado_por_id)');
        $this->addSql('CREATE TABLE texto_definitivo_expediente_adjunto (id INT NOT NULL, expediente_id INT DEFAULT NULL, texto_definitivo_id INT DEFAULT NULL, creado_por_id INT DEFAULT NULL, actualizado_por_id INT DEFAULT NULL, activo BOOLEAN NOT NULL, fecha_creacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, fecha_actualizacion TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F62D57D4BF37E4E ON texto_definitivo_expediente_adjunto (expediente_id)');
        $this->addSql('CREATE INDEX IDX_F62D57DAD63366F ON texto_definitivo_expediente_adjunto (texto_definitivo_id)');
        $this->addSql('CREATE INDEX IDX_F62D57DFE35D8C4 ON texto_definitivo_expediente_adjunto (creado_por_id)');
        $this->addSql('CREATE INDEX IDX_F62D57DF6167A1C ON texto_definitivo_expediente_adjunto (actualizado_por_id)');
        $this->addSql('ALTER TABLE rama ADD CONSTRAINT FK_43815238FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE rama ADD CONSTRAINT FK_43815238F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo ADD CONSTRAINT FK_E313F079610C661D FOREIGN KEY (dictamen_id) REFERENCES dictamen (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo ADD CONSTRAINT FK_E313F0795E0BFD3B FOREIGN KEY (rama_id) REFERENCES rama (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo ADD CONSTRAINT FK_E313F0791CCCADCB FOREIGN KEY (sesion_id) REFERENCES sesion (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo ADD CONSTRAINT FK_E313F079FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo ADD CONSTRAINT FK_E313F079F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE anexo_texto_definitivo ADD CONSTRAINT FK_AA5E8444AD63366F FOREIGN KEY (texto_definitivo_id) REFERENCES texto_definitivo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE anexo_texto_definitivo ADD CONSTRAINT FK_AA5E8444FE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE anexo_texto_definitivo ADD CONSTRAINT FK_AA5E8444F6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo_expediente_adjunto ADD CONSTRAINT FK_F62D57D4BF37E4E FOREIGN KEY (expediente_id) REFERENCES expediente (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo_expediente_adjunto ADD CONSTRAINT FK_F62D57DAD63366F FOREIGN KEY (texto_definitivo_id) REFERENCES texto_definitivo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo_expediente_adjunto ADD CONSTRAINT FK_F62D57DFE35D8C4 FOREIGN KEY (creado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE texto_definitivo_expediente_adjunto ADD CONSTRAINT FK_F62D57DF6167A1C FOREIGN KEY (actualizado_por_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dictamen_o_d ADD incorporado_en_sesion BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE dictamen_o_d ADD aprobado_sobre_tabla BOOLEAN DEFAULT NULL');
        $this->addSql('ALTER TABLE dictamen_o_d ADD vuelta_acomision BOOLEAN DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE texto_definitivo DROP CONSTRAINT FK_E313F0795E0BFD3B');
        $this->addSql('ALTER TABLE anexo_texto_definitivo DROP CONSTRAINT FK_AA5E8444AD63366F');
        $this->addSql('ALTER TABLE texto_definitivo_expediente_adjunto DROP CONSTRAINT FK_F62D57DAD63366F');
        $this->addSql('DROP SEQUENCE aprobado_en_sesion_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE rama_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE texto_definitivo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE anexo_texto_definitivo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE texto_definitivo_expediente_adjunto_id_seq CASCADE');
        $this->addSql('DROP TABLE aprobado_en_sesion');
        $this->addSql('DROP TABLE rama');
        $this->addSql('DROP TABLE texto_definitivo');
        $this->addSql('DROP TABLE anexo_texto_definitivo');
        $this->addSql('DROP TABLE texto_definitivo_expediente_adjunto');
        $this->addSql('ALTER TABLE dictamen_o_d DROP incorporado_en_sesion');
        $this->addSql('ALTER TABLE dictamen_o_d DROP aprobado_sobre_tabla');
        $this->addSql('ALTER TABLE dictamen_o_d DROP vuelta_acomision');
    }
}
