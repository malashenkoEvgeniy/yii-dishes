<?php


namespace frontend\models;


use yii\base\Model;

class SelectionRecipe extends Model
{
    public $ingredient1;
    public $ingredient2;
    public $ingredient3;
    public $ingredient4;
    public $ingredient5;

    public function rules()
    {
        return [
          [['ingredient1', 'ingredient2', 'ingredient3', 'ingredient4', 'ingredient5'], 'string', 'max' => 128],
        ];
    }
}