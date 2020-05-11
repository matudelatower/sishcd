<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508161710 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP INDEX uniq_957a6479c05fb297');
        $this->addSql('DROP INDEX uniq_957a647992fc23a8');
        $this->addSql('DROP INDEX uniq_957a6479a0d96fbf');
        $this->addSql('ALTER TABLE fos_user ADD roles JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user DROP username_canonical');
        $this->addSql('ALTER TABLE fos_user DROP email_canonical');
        $this->addSql('ALTER TABLE fos_user DROP enabled');
        $this->addSql('ALTER TABLE fos_user DROP salt');
        $this->addSql('ALTER TABLE fos_user DROP last_login');
        $this->addSql('ALTER TABLE fos_user DROP confirmation_token');
        $this->addSql('ALTER TABLE fos_user DROP password_requested_at');
        $this->addSql('ALTER TABLE fos_user ALTER username TYPE VARCHAR(255)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479E7927C74 ON fos_user (email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479F85E0677 ON fos_user (username)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_957A6479E7927C74');
        $this->addSql('DROP INDEX UNIQ_957A6479F85E0677');
        $this->addSql('ALTER TABLE fos_user ADD username_canonical VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE fos_user ADD email_canonical VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE fos_user ADD enabled BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE fos_user ADD salt VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD confirmation_token VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD password_requested_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user DROP roles');
        $this->addSql('ALTER TABLE fos_user ALTER username TYPE VARCHAR(180)');
        $this->addSql('CREATE UNIQUE INDEX uniq_957a6479c05fb297 ON fos_user (confirmation_token)');
        $this->addSql('CREATE UNIQUE INDEX uniq_957a647992fc23a8 ON fos_user (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX uniq_957a6479a0d96fbf ON fos_user (email_canonical)');
    }
}
