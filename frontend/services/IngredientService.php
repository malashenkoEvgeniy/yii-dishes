<?php


namespace frontend\services;


class IngredientService
{
    public static function result($array)
    {
        $result = [];
        if(!empty($array['ingredient1'])) {
            array_push($result, $array['ingredient1']);
        }
        if(!empty($array['ingredient2'])) {
            array_push($result, $array['ingredient2']);
        }
        if(!empty($array['ingredient3'])) {
            array_push($result, $array['ingredient3']);
        }
        if(!empty($array['ingredient4'])) {
            array_push($result, $array['ingredient4']);
        }
        if(!empty($array['ingredient5'])) {
            array_push($result, $array['ingredient5']);
        }

        return $result;
    }

}