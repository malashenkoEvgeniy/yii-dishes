<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string $title
 * @property int|null $disabled
 *
 * @property Recipe[] $recipes
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['disabled'], 'integer'],
            [['title'], 'string', 'max' => 128],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'disabled' => 'Disabled',
        ];
    }

    /**
     * Gets query for [[Recipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::class, ['ingredient_id' => 'id']);
    }

    public static function create($titleArray)
    {
        $id = [];
        foreach ($titleArray as $title){
            $ingredient = new static();
            $ingredient->title = $title;
            $ingredient->save();
            array_push($id, $ingredient->id);
        }
        return $id;
    }
}
