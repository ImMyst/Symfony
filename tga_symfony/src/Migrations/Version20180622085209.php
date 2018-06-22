<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180622085209 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_item CHANGE category_id category_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE shopping_item ADD CONSTRAINT FK_6612795F9777D11E FOREIGN KEY (category_id_id) REFERENCES shopping_category (id)');
        $this->addSql('CREATE INDEX IDX_6612795F9777D11E ON shopping_item (category_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shopping_item DROP FOREIGN KEY FK_6612795F9777D11E');
        $this->addSql('DROP INDEX IDX_6612795F9777D11E ON shopping_item');
        $this->addSql('ALTER TABLE shopping_item CHANGE category_id_id category_id INT NOT NULL');
    }
}