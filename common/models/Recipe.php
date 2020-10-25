<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recipe".
 *
 * @property int $id
 * @property int $dishe_id
 * @property int $ingredient_id
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
            [['dishe_id', 'ingredient_id'], 'integer'],
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
            'dishe_id' => 'Dishe ID',
            'ingredient_id' => 'Ingredient ID',
        ];
    }

    /**
     * Gets query for [[Dishe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishe()
    {
        return $this->hasOne(Dishe::className(), ['id' => 'dishe_id']);
    }

    /**
     * Gets query for [[Ingredient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
        return $this->hasOne(Ingredient::className(), ['id' => 'ingredient_id']);
    }
}
