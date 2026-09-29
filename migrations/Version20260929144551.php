<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260929144551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__book AS
            SELECT
              id,
              title,
              isbn,
              summary,
              publication_date,
              available,
              language,
              cover_url,
              added_by_id
            FROM
              book
        SQL);
        $this->addSql('DROP TABLE book');
        $this->addSql(<<<'SQL'
            CREATE TABLE book (
              id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
              title VARCHAR(255) NOT NULL,
              isbn VARCHAR(13) DEFAULT NULL,
              summary CLOB DEFAULT NULL,
              publication_date DATE DEFAULT NULL,
              available BOOLEAN NOT NULL,
              language VARCHAR(2) DEFAULT NULL,
              cover_url VARCHAR(255) DEFAULT NULL,
              added_by_id INTEGER DEFAULT NULL,
              slug VARCHAR(255) DEFAULT NULL,
              CONSTRAINT FK_CBE5A33155B127A4 FOREIGN KEY (added_by_id) REFERENCES user (id) ON
              UPDATE
                NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO book (
              id, title, isbn, summary, publication_date,
              available, language, cover_url, added_by_id
            )
            SELECT
              id,
              title,
              isbn,
              summary,
              publication_date,
              available,
              language,
              cover_url,
              added_by_id
            FROM
              __temp__book
        SQL);
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A33155B127A4 ON book (added_by_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CBE5A331989D9B62 ON book (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TEMPORARY TABLE __temp__book AS
            SELECT
              id,
              title,
              isbn,
              summary,
              publication_date,
              available,
              language,
              cover_url,
              added_by_id
            FROM
              book
        SQL);
        $this->addSql('DROP TABLE book');
        $this->addSql(<<<'SQL'
            CREATE TABLE book (
              id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
              title VARCHAR(255) NOT NULL,
              isbn VARCHAR(13) DEFAULT NULL,
              summary CLOB DEFAULT NULL,
              publication_date DATE DEFAULT NULL,
              available BOOLEAN NOT NULL,
              language VARCHAR(2) DEFAULT NULL,
              cover_url VARCHAR(255) DEFAULT NULL,
              added_by_id INTEGER DEFAULT NULL,
              CONSTRAINT FK_CBE5A33155B127A4 FOREIGN KEY (added_by_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE
            )
        SQL);
        $this->addSql(<<<'SQL'
            INSERT INTO book (
              id, title, isbn, summary, publication_date,
              available, language, cover_url, added_by_id
            )
            SELECT
              id,
              title,
              isbn,
              summary,
              publication_date,
              available,
              language,
              cover_url,
              added_by_id
            FROM
              __temp__book
        SQL);
        $this->addSql('DROP TABLE __temp__book');
        $this->addSql('CREATE INDEX IDX_CBE5A33155B127A4 ON book (added_by_id)');
    }
}
