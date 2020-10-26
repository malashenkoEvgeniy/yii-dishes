<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property int $dishe_id
 * @property int $ingredient_id
 * @property int|null $disabled
 *
 * @property Dishe $dishe
 * @property Ingredient $ingredient
 */
class Recipe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recipe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dishe_id', 'ingredient_id'], 'required'],
            [['dishe_id', 'ingredient_id', 'disabled'], 'integer'],
            [['dishe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dishe::className(), 'targetAttribute' => ['dishe_id' => 'id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['ingredient_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dishe_id' => 'Блюда',
            'ingredient_id' => 'Ингридиенты',
            'disabled' => 'Disabled',
        ];
    }

    /**
     * Gets query for [[Dishe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishe()
    {
        return $this->hasOne(Dishe::class, ['id' => 'dishe_id']);
    }

    /**
     * Gets query for [[Ingredient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::class, ['id' => 'ingredient_id']);
    }

    public static function create($dishe, $ingredients)
    {
        foreach ($ingredients as $ingredient) {
            $recipe = new static();
            $recipe->dishe_id = $dishe;
            $recipe->ingredient_id = $ingredient;
            $recipe->save();
        }
        return true;
    }
}
