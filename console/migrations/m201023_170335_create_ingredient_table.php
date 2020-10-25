<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredient}}`.
 */
class m201023_170335_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
            'disabled' => $this->tinyInteger()->defaultValue(1),
        ]);

        $this->batchInsert('ingredient', ['title'], [['Вода'],
                                                      ['Майонез'],
                                                      ['Сметана'],
                                                      ['Фасоль'],
                                                      ['Морковь'],
                                                      ['Лук'],
                                                      ['Маринованные огурцы'],
                                                      ['Зеленый горошек'],
                                                      ['Куриное яйцо'],
                                                      ['Докторская колбаса'],
                                                      ['Мясо'],
                                                      ['Свекла'],
                                                      ['Растительное масло'],
                                                      ['Томатная паста'],
                                                      ['Капуста'],
                                                      ['Картофель'],
                                                      ['Соль'],]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ingredient}}');
    }
}
