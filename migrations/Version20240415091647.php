<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240415091647 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE nota DROP FOREIGN KEY FK_C8D03E0D53C8D32C');
        $this->addSql('ALTER TABLE persona_nota DROP FOREIGN KEY FK_7B3370FA98F9F02');
        $this->addSql('ALTER TABLE persona_nota DROP FOREIGN KEY FK_7B3370FF5F88DB9');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE persona_nota');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX IDX_C8D03E0D53C8D32C ON nota');
        $this->addSql('ALTER TABLE nota ADD fecha_modificion DATETIME NOT NULL, DROP propietario_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE persona_nota (persona_id INT NOT NULL, nota_id INT NOT NULL, INDEX IDX_7B3370FA98F9F02 (nota_id), INDEX IDX_7B3370FF5F88DB9 (persona_id), PRIMARY KEY(persona_id, nota_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE persona_nota ADD CONSTRAINT FK_7B3370FA98F9F02 FOREIGN KEY (nota_id) REFERENCES nota (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE persona_nota ADD CONSTRAINT FK_7B3370FF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE nota ADD propietario_id INT NOT NULL, DROP fecha_modificion');
        $this->addSql('ALTER TABLE nota ADD CONSTRAINT FK_C8D03E0D53C8D32C FOREIGN KEY (propietario_id) REFERENCES persona (id)');
        $this->addSql('CREATE INDEX IDX_C8D03E0D53C8D32C ON nota (propietario_id)');
    }
}
