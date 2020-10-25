<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%recipe}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%dishe}}`
 * - `{{%ingredient}}`
 */
class m201023_173837_create_recipe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%recipe}}', [
            'id' => $this->primaryKey(),
            'dishe_id' => $this->integer()->notNull(),
            'ingredient_id' => $this->integer()->notNull(),
            'disabled' => $this->tinyInteger()->defaultValue(1),
        ]);

        // creates index for column `dishe_id`
        $this->createIndex(
            '{{%idx-recipe-dishe_id}}',
            '{{%recipe}}',
            'dishe_id'
        );

        // add foreign key for table `{{%dishe}}`
        $this->addForeignKey(
            '{{%fk-recipe-dishe_id}}',
            '{{%recipe}}',
            'dishe_id',
            '{{%dishe}}',
            'id',
            'CASCADE'
        );

        // creates index for column `ingredient_id`
        $this->createIndex(
            '{{%idx-recipe-ingredient_id}}',
            '{{%recipe}}',
            'ingredient_id'
        );

        // add foreign key for table `{{%ingredient}}`
        $this->addForeignKey(
            '{{%fk-recipe-ingredient_id}}',
            '{{%recipe}}',
            'ingredient_id',
            '{{%ingredient}}',
            'id',
            'CASCADE'
        );

        $this->batchInsert('recipe', ['dishe_id', 'ingredient_id'],[
                                                              [1,1],
                                                              [1,11],
                                                              [1,12],
                                                              [1,5],
                                                              [1,6],
                                                              [1,13],
                                                              [1,14],
                                                              [1,15],
                                                              [1,16],
                                                              [1,17],
                                                              [2,5],
                                                              [2,9],
                                                              [2,10],
                                                              [2,12],
                                                              [2,16],
                                                              [2,6],
                                                              [2,7],
                                                              [2,17],
                                                              [3,6],
                                                              [3,7],
                                                              [3,17],
                                                              [3,4],
                                                              [3,15],]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%dishe}}`
        $this->dropForeignKey(
            '{{%fk-recipe-dishe_id}}',
            '{{%recipe}}'
        );

        // drops index for column `dishe_id`
        $this->dropIndex(
            '{{%idx-recipe-dishe_id}}',
            '{{%recipe}}'
        );

        // drops foreign key for table `{{%ingredient}}`
        $this->dropForeignKey(
            '{{%fk-recipe-ingredient_id}}',
            '{{%recipe}}'
        );

        // drops index for column `ingredient_id`
        $this->dropIndex(
            '{{%idx-recipe-ingredient_id}}',
            '{{%recipe}}'
        );

        $this->dropTable('{{%recipe}}');
    }
}
