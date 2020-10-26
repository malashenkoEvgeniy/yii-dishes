<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recipes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Recipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
            'attribute'=>'dishe_id',
            'value'=>function ($data) {
                return $data->dishe->title;
            },
            'filter'=>ArrayHelper::getColumn($dishe, 'title')
            ],
            [
            'attribute'=>'ingredient_id',
              'value'=>function ($data) {
                  return $data->ingredient->title;
              },
            'filter'=>ArrayHelper::getColumn($ingredient, 'title')
            ],

            ['class' => 'yii\grid\ActionColumn',],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
