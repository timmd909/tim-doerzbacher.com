<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20140323225624 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1DFC611B1");
        $this->addSql("CREATE TABLE link_categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, weight INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE links (id INT AUTO_INCREMENT NOT NULL, link_category_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, target VARCHAR(255) NOT NULL, weight VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, INDEX IDX_D182A118DFC611B1 (link_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE links ADD CONSTRAINT FK_D182A118DFC611B1 FOREIGN KEY (link_category_id) REFERENCES link_categories (id)");
        $this->addSql("DROP TABLE link");
        $this->addSql("DROP TABLE link_category");
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql", "Migration can only be executed safely on 'mysql'.");
        
        $this->addSql("ALTER TABLE links DROP FOREIGN KEY FK_D182A118DFC611B1");
        $this->addSql("CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, link_category_id INT DEFAULT NULL, linkName VARCHAR(255) NOT NULL, linkTarget VARCHAR(255) NOT NULL, linkWeight VARCHAR(255) NOT NULL, linkDescription VARCHAR(255) NOT NULL, linkBackground VARCHAR(255) DEFAULT NULL, INDEX IDX_36AC99F1DFC611B1 (link_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("CREATE TABLE link_category (id INT AUTO_INCREMENT NOT NULL, categoryName VARCHAR(255) NOT NULL, categoryWeight INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE link ADD CONSTRAINT FK_36AC99F1DFC611B1 FOREIGN KEY (link_category_id) REFERENCES link_category (id)");
        $this->addSql("DROP TABLE link_categories");
        $this->addSql("DROP TABLE links");
    }
}
