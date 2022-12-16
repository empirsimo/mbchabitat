<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216020502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artisan_categorie (artisan_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_9AC1A6605ED3C7B7 (artisan_id), INDEX IDX_9AC1A660BCF5E72D (categorie_id), PRIMARY KEY(artisan_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artisan_categorie ADD CONSTRAINT FK_9AC1A6605ED3C7B7 FOREIGN KEY (artisan_id) REFERENCES artisan (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artisan_categorie ADD CONSTRAINT FK_9AC1A660BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artisan ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE artisan ADD CONSTRAINT FK_3C600AD3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_3C600AD3A76ED395 ON artisan (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artisan_categorie DROP FOREIGN KEY FK_9AC1A6605ED3C7B7');
        $this->addSql('ALTER TABLE artisan_categorie DROP FOREIGN KEY FK_9AC1A660BCF5E72D');
        $this->addSql('DROP TABLE artisan_categorie');
        $this->addSql('ALTER TABLE artisan DROP FOREIGN KEY FK_3C600AD3A76ED395');
        $this->addSql('DROP INDEX IDX_3C600AD3A76ED395 ON artisan');
        $this->addSql('ALTER TABLE artisan DROP user_id');
    }
}
