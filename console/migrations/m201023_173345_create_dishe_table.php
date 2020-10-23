<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishe}}`.
 */
class m201023_173345_create_dishe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dishe}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
        ]);

        $this->batchInsert('dishe', ['title'], [['Борщ'], ['Оливье'], ['Венигред'],]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dishe}}');
    }
}
