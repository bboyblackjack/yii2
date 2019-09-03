<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lichnost}}`.
 */
class m190903_115848_create_lichnost_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lichnost}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'patronymic' => $this->string(255),
            'birthday' => $this->date()->notNull(),
            'sex' => $this->boolean()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lichnost}}');
    }
}
