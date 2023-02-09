<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213104831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent_categorie (id INT AUTO_INCREMENT NOT NULL, categorie_id INT DEFAULT NULL, adherent_id INT DEFAULT NULL, annee INT NOT NULL, INDEX IDX_24AAB700BCF5E72D (categorie_id), INDEX IDX_24AAB70025F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB700BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE adherent_categorie ADD CONSTRAINT FK_24AAB70025F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B82A15E8FD');
        $this->addSql('ALTER TABLE entrainement_terrain DROP FOREIGN KEY FK_5D1E4B828A2D8B41');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10A25F06C53');
        $this->addSql('ALTER TABLE categorie_adherent DROP FOREIGN KEY FK_A854B10ABCF5E72D');
        $this->addSql('ALTER TABLE categorie_pole DROP FOREIGN KEY FK_8A49C5B6BCF5E72D');
        $this->addSql('ALTER TABLE categorie_pole DROP FOREIGN KEY FK_8A49C5B6419C3385');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3AA15E8FD');
        $this->addSql('ALTER TABLE entrainement_categorie DROP FOREIGN KEY FK_AE7ABE3ABCF5E72D');
        $this->addSql('DROP TABLE entrainement_terrain');
        $this->addSql('DROP TABLE categorie_adherent');
        $this->addSql('DROP TABLE categorie_pole');
        $this->addSql('DROP TABLE entrainement_categorie');
        $this->addSql('ALTER TABLE categorie ADD pole_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634419C3385 FOREIGN KEY (pole_id) REFERENCES pole (id)');
        $this->addSql('CREATE INDEX IDX_497DD634419C3385 ON categorie (pole_id)');
        $this->addSql('ALTER TABLE entrainement ADD terrain_id INT DEFAULT NULL, ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entrainement ADD CONSTRAINT FK_A27444E58A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id)');
        $this->addSql('ALTER TABLE entrainement ADD CONSTRAINT FK_A27444E5BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_A27444E58A2D8B41 ON entrainement (terrain_id)');
        $this->addSql('CREATE INDEX IDX_A27444E5BCF5E72D ON entrainement (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entrainement_terrain (entrainement_id INT NOT NULL, terrain_id INT NOT NULL, INDEX IDX_5D1E4B82A15E8FD (entrainement_id), INDEX IDX_5D1E4B828A2D8B41 (terrain_id), PRIMARY KEY(entrainement_id, terrain_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie_adherent (categorie_id INT NOT NULL, adherent_id INT NOT NULL, INDEX IDX_A854B10A25F06C53 (adherent_id), INDEX IDX_A854B10ABCF5E72D (categorie_id), PRIMARY KEY(categorie_id, adherent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE categorie_pole (categorie_id INT NOT NULL, pole_id INT NOT NULL, INDEX IDX_8A49C5B6BCF5E72D (categorie_id), INDEX IDX_8A49C5B6419C3385 (pole_id), PRIMARY KEY(categorie_id, pole_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE entrainement_categorie (entrainement_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_AE7ABE3AA15E8FD (entrainement_id), INDEX IDX_AE7ABE3ABCF5E72D (categorie_id), PRIMARY KEY(entrainement_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B82A15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_terrain ADD CONSTRAINT FK_5D1E4B828A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10A25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_adherent ADD CONSTRAINT FK_A854B10ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_pole ADD CONSTRAINT FK_8A49C5B6BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE categorie_pole ADD CONSTRAINT FK_8A49C5B6419C3385 FOREIGN KEY (pole_id) REFERENCES pole (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3AA15E8FD FOREIGN KEY (entrainement_id) REFERENCES entrainement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entrainement_categorie ADD CONSTRAINT FK_AE7ABE3ABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB700BCF5E72D');
        $this->addSql('ALTER TABLE adherent_categorie DROP FOREIGN KEY FK_24AAB70025F06C53');
        $this->addSql('DROP TABLE adherent_categorie');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634419C3385');
        $this->addSql('DROP INDEX IDX_497DD634419C3385 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP pole_id');
        $this->addSql('ALTER TABLE entrainement DROP FOREIGN KEY FK_A27444E58A2D8B41');
        $this->addSql('ALTER TABLE entrainement DROP FOREIGN KEY FK_A27444E5BCF5E72D');
        $this->addSql('DROP INDEX IDX_A27444E58A2D8B41 ON entrainement');
        $this->addSql('DROP INDEX IDX_A27444E5BCF5E72D ON entrainement');
        $this->addSql('ALTER TABLE entrainement DROP terrain_id, DROP categorie_id');
    }
}
