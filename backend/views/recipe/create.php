<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $createRecipe */

$this->title = 'Create Recipe';
$this->params['breadcrumbs'][] = ['label' => 'Recipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recipe-create">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($createRecipe, 'title')->textInput() ?>

    <?= $form->field($createRecipe, 'ingredients')->textarea(['placeholder'=>'Перечислите ингридиенты через запятую', 'rows'=>6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
