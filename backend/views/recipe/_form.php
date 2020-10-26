<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dishe_id')->dropDownList(ArrayHelper::getColumn($dishe, 'title'),['disabled'=>true]) ?>

    <?= $form->field($model, 'ingredient_id')->dropDownList(ArrayHelper::getColumn($ingredient, 'title'),['disabled'=>true]) ?>

    <?= $form->field($model, 'disabled')->dropDownList(['Disabled', 'Active']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
