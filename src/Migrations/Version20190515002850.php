<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190515002850 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574AABC1F7FE');
        $this->addSql('DROP INDEX IDX_9014574AABC1F7FE ON matiere');
        $this->addSql('ALTER TABLE matiere CHANGE prof_id profs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ABDDFA3C9 FOREIGN KEY (profs_id) REFERENCES prof (id)');
        $this->addSql('CREATE INDEX IDX_9014574ABDDFA3C9 ON matiere (profs_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574ABDDFA3C9');
        $this->addSql('DROP INDEX IDX_9014574ABDDFA3C9 ON matiere');
        $this->addSql('ALTER TABLE matiere CHANGE profs_id prof_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AABC1F7FE FOREIGN KEY (prof_id) REFERENCES prof (id)');
        $this->addSql('CREATE INDEX IDX_9014574AABC1F7FE ON matiere (prof_id)');
    }
}
