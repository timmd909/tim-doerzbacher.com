<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140320045148 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE link ADD link_category_id INT DEFAULT NULL, DROP linkCategory");
        $this->addSql("ALTER TABLE link ADD CONSTRAINT FK_36AC99F1DFC611B1 FOREIGN KEY (link_category_id) REFERENCES link_category (id)");
        $this->addSql("CREATE INDEX IDX_36AC99F1DFC611B1 ON link (link_category_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1DFC611B1");
        $this->addSql("DROP INDEX IDX_36AC99F1DFC611B1 ON link");
        $this->addSql("ALTER TABLE link ADD linkCategory INT NOT NULL, DROP link_category_id");
    }
}
