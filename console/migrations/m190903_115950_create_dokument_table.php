<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dokument}}`.
 */
class m190903_115950_create_dokument_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dokument}}', [
            'id' => $this->primaryKey(),
            'series' => $this->string(6),
            'number' => $this->string(10)->notNull(),
            'issue_date' => $this->date()->notNull(),
            'type' => $this->string(255)->notNull(),
            'lichnost_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('dokument_lichnost_fk', 'dokument', 'lichnost_id', 'lichnost', 'id');
        $this->createIndex('unique-series-number','dokument', ['series', 'number'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dokument}}');
    }
}
