<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140328074712 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE experience_points ADD parent_id INT NOT NULL");
        $this->addSql("ALTER TABLE experience_points ADD CONSTRAINT FK_D30D6904727ACA70 FOREIGN KEY (parent_id) REFERENCES experience_points (id)");
        $this->addSql("CREATE INDEX IDX_D30D6904727ACA70 ON experience_points (parent_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE experience_points DROP FOREIGN KEY FK_D30D6904727ACA70");
        $this->addSql("DROP INDEX IDX_D30D6904727ACA70 ON experience_points");
        $this->addSql("ALTER TABLE experience_points DROP parent_id");
    }
}
