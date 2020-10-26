<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recipe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            [
            'attribute'=>'disabled',
            'value'=>function ($data) {
                if($data->disabled == 1 ){
                    return 'Active';
                }
                return 'Disabled';
            },
            'filter'=>['Disabled', 'Active']
            ],
        ],
    ]) ?>

</div>
