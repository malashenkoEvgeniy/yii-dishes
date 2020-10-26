<?php


namespace backend\models;


use yii\base\Model;

class CreateRecipe extends Model
{
    public $title;
    public $ingredients;

    public function rules()
    {
        return [
          [['title', 'ingredients'], 'required'],
          [['title', 'ingredients'], 'string'],

        ];
    }

    public function attributeLabels()
    {
        return [
          'title' => 'Название блюда',
          'ingredients' => 'Ингридиенты',
        ];
    }
}
