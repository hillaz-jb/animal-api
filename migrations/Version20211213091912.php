<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213091912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_breed DROP FOREIGN KEY FK_D95C51BB8E962C16');
        $this->addSql('ALTER TABLE animal_breed DROP FOREIGN KEY FK_D95C51BBA8B4A30F');
        $this->addSql('ALTER TABLE animal_breed ADD CONSTRAINT FK_D95C51BB8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE animal_breed ADD CONSTRAINT FK_D95C51BBA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal_breed DROP FOREIGN KEY FK_D95C51BB8E962C16');
        $this->addSql('ALTER TABLE animal_breed DROP FOREIGN KEY FK_D95C51BBA8B4A30F');
        $this->addSql('ALTER TABLE animal_breed ADD CONSTRAINT FK_D95C51BB8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE animal_breed ADD CONSTRAINT FK_D95C51BBA8B4A30F FOREIGN KEY (breed_id) REFERENCES breed (id) ON DELETE CASCADE');
    }
}
