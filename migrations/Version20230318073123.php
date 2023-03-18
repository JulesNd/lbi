<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230318073123 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE api_token (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, token VARCHAR(255) NOT NULL, INDEX IDX_7BA2F5EBA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE api_token ADD CONSTRAINT FK_7BA2F5EBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE movie_has_people ADD id INT AUTO_INCREMENT NOT NULL, DROP Movie_id, DROP People_id, DROP role, DROP significance, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY fk_Movie_has_Type_Type1');
        $this->addSql('ALTER TABLE movie_has_type DROP FOREIGN KEY fk_Movie_has_Type_Movie1');
        $this->addSql('DROP INDEX fk_Movie_has_Type_Type1 ON movie_has_type');
        $this->addSql('DROP INDEX IDX_D7417FB76E5D4AA ON movie_has_type');
        $this->addSql('DROP INDEX `primary` ON movie_has_type');
        $this->addSql('ALTER TABLE movie_has_type CHANGE Movie_id movie_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE movie_has_type ADD PRIMARY KEY (movie_id)');
        $this->addSql('ALTER TABLE type DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE api_token DROP FOREIGN KEY FK_7BA2F5EBA76ED395');
        $this->addSql('DROP TABLE api_token');
        $this->addSql('ALTER TABLE movie_has_people MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON movie_has_people');
        $this->addSql('ALTER TABLE movie_has_people ADD Movie_id INT NOT NULL, ADD People_id INT NOT NULL, ADD role VARCHAR(255) NOT NULL, ADD significance TEXT DEFAULT NULL, DROP id');
        $this->addSql('ALTER TABLE movie_has_people ADD PRIMARY KEY (Movie_id, People_id)');
        $this->addSql('ALTER TABLE movie_has_type MODIFY movie_id INT NOT NULL');
        $this->addSql('ALTER TABLE movie_has_type MODIFY movie_id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON movie_has_type');
        $this->addSql('ALTER TABLE movie_has_type CHANGE movie_id Movie_id INT NOT NULL');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT fk_Movie_has_Type_Type1 FOREIGN KEY (Type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE movie_has_type ADD CONSTRAINT fk_Movie_has_Type_Movie1 FOREIGN KEY (Movie_id) REFERENCES movie (id)');
        $this->addSql('CREATE INDEX fk_Movie_has_Type_Type1 ON movie_has_type (Type_id)');
        $this->addSql('CREATE INDEX IDX_D7417FB76E5D4AA ON movie_has_type (Movie_id)');
        $this->addSql('ALTER TABLE movie_has_type ADD PRIMARY KEY (Movie_id, Type_id)');
        $this->addSql('ALTER TABLE type ADD name VARCHAR(255) NOT NULL');
    }
}
