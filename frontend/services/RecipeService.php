<?php


namespace frontend\services;


use common\models\Recipe;

class RecipeService
{
    public static function result($post)
    {
        $post_result = array_values($post['SelectionRecipe']);
        foreach ($post_result as $key=>$item){
            if(empty($item)){
                unset($post_result[$key]);
            }
            if($item < 2){
                unset($post_result[$key]);
            }
        }
        sort($post_result);

        $searchResult = Recipe::find()
          ->andWhere(['in', 'ingredient_id', $post_result])
         ->andWhere(['recipe.disabled' => 1])
          ->joinWith('dishe')
          ->joinWith('ingredient')
          ->all();
        $newArrayRecipe = [];
        $ingredients = [];
        $i = 0;
        foreach ($searchResult as $item) {
            $ingredients[$i] = ['title' => $item->dishe->title, 'value' => $item->ingredient->title];
            $i++;
        }
        $titleIngredient = $ingredients[0]['title'];
        $j = 0;
        foreach ($ingredients as $item){
            if($item['title']==$titleIngredient){
                $elems = [];
                foreach ($ingredients as $value){
                    if($value['title'] == $titleIngredient) {
                        array_push($elems, $value['value']);
                    }
                }
                $newArrayRecipe[$j]['title'] = $titleIngredient;
                $newArrayRecipe[$j]['value'] = $elems;
                $newArrayRecipe[$j]['count_elems'] = count($elems);
            } else {
                $titleIngredient = $item['title'];
                $j++;
            }
        }
        usort($newArrayRecipe, function($a, $b){
            return ($b['count_elems'] - $a['count_elems']);
        });
        return $newArrayRecipe;
    }
}
