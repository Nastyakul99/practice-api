<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709080457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE locr (id INT AUTO_INCREMENT NOT NULL, worker_id INT NOT NULL, time_id INT NOT NULL, file VARCHAR(255) NOT NULL, statistics DOUBLE PRECISION NOT NULL, mark INT NOT NULL, INDEX IDX_E3E433CE6B20BA36 (worker_id), INDEX IDX_E3E433CE5EEADD3B (time_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, quarter INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locr ADD CONSTRAINT FK_E3E433CE6B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE locr ADD CONSTRAINT FK_E3E433CE5EEADD3B FOREIGN KEY (time_id) REFERENCES time (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locr DROP FOREIGN KEY FK_E3E433CE5EEADD3B');
        $this->addSql('DROP TABLE locr');
        $this->addSql('DROP TABLE time');
    }
}
