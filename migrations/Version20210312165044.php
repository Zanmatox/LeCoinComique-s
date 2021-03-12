<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210312165044 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_369ECA323375BD21 (editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA323375BD21 FOREIGN KEY (editeur_id) REFERENCES editeur (id)');
        $this->addSql('DROP TABLE produit');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_auteur_id INT DEFAULT NULL, id_genre_id INT DEFAULT NULL, ref_editeur_id INT DEFAULT NULL, ref_bd VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, heros VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix_public DOUBLE PRECISION NOT NULL, id_fournisseur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, prix_editeur DOUBLE PRECISION DEFAULT NULL, resume LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ref_fournisseur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_29A5EC27124D3F8A (id_genre_id), INDEX IDX_29A5EC27E08ED3C1 (id_auteur_id), INDEX IDX_29A5EC2735B0523F (ref_editeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27124D3F8A FOREIGN KEY (id_genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2735B0523F FOREIGN KEY (ref_editeur_id) REFERENCES editeur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27E08ED3C1 FOREIGN KEY (id_auteur_id) REFERENCES auteur (id)');
        $this->addSql('DROP TABLE fournisseur');
    }
}
