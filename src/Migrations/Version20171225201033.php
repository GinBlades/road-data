<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171225201033 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE winter_road_condition (id INT AUTO_INCREMENT NOT NULL, road_condition VARCHAR(255) NOT NULL, area_name VARCHAR(255) NOT NULL, location_description VARCHAR(510) NOT NULL, roadway_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE road_event (id INT AUTO_INCREMENT NOT NULL, last_updated DATETIME NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, planned_end_date DATETIME DEFAULT NULL, reported DATETIME NOT NULL, start_date DATETIME NOT NULL, dot_id VARCHAR(120) NOT NULL, region_name VARCHAR(255) NOT NULL, county_name VARCHAR(255) NOT NULL, severity VARCHAR(255) NOT NULL, roadway_name VARCHAR(255) NOT NULL, direction_of_travel VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, location VARCHAR(255) NOT NULL, lanes_affected VARCHAR(255) NOT NULL, lanes_status VARCHAR(255) DEFAULT NULL, lcs_entries VARCHAR(255) DEFAULT NULL, navteq_link_id VARCHAR(255) DEFAULT NULL, primary_location VARCHAR(255) DEFAULT NULL, secondary_location VARCHAR(255) DEFAULT NULL, first_article_city VARCHAR(255) DEFAULT NULL, second_city VARCHAR(255) DEFAULT NULL, event_type VARCHAR(255) NOT NULL, event_sub_type VARCHAR(255) NOT NULL, map_encoded_polyline VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F100FCED4498279A (dot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadway (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(120) NOT NULL, sort_order INT DEFAULT NULL, UNIQUE INDEX UNIQ_BAE70F15E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE road_alert (id INT AUTO_INCREMENT NOT NULL, dot_id INT NOT NULL, message LONGTEXT DEFAULT NULL, notes LONGTEXT DEFAULT NULL, area_names LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sign (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, dot_id VARCHAR(120) NOT NULL, name VARCHAR(255) NOT NULL, roadway VARCHAR(255) NOT NULL, direction_of_travel VARCHAR(255) NOT NULL, messages LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_9F7E91FE4498279A (dot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE camera (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, dot_id VARCHAR(120) NOT NULL, name VARCHAR(255) NOT NULL, direction_of_travel VARCHAR(255) NOT NULL, roadway_name VARCHAR(255) NOT NULL, url VARCHAR(510) NOT NULL, UNIQUE INDEX UNIQ_3B1CEE054498279A (dot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE winter_road_condition');
        $this->addSql('DROP TABLE road_event');
        $this->addSql('DROP TABLE roadway');
        $this->addSql('DROP TABLE road_alert');
        $this->addSql('DROP TABLE sign');
        $this->addSql('DROP TABLE camera');
    }
}
