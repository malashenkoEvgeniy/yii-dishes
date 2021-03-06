<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dishe".
 *
 * @property int $id
 * @property string $title
 *
 * @property Recipe[] $recipes
 */
class Dishe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dishe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[Recipes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecipes()
    {
        return $this->hasMany(Recipe::className(), ['dishe_id' => 'id']);
    }

    public static function create($title)
    {
        $dishe = new static();
        $dishe->title = $title;
        $dishe->save();
        return $dishe->id;
    }
}
