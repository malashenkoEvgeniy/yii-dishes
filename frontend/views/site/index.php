<?php

/* @var $this yii\web\View */
/* @var $model */
/* @var $data */
/* @var $dishes */

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Recipe';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Ингридиенты</h2>
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'ingredient1')->widget(Select2::classname(), [
                                                    'data' => $data,
                                                    'language' => 'ru',
                                                    'options' => ['placeholder' => 'Select a state ...'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ]); ?>
                <?= $form->field($model, 'ingredient2')->widget(Select2::classname(), [
                  'data' => $data,
                  'language' => 'ru',
                  'options' => ['placeholder' => 'Select a state ...'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],
                ]); ?>
                <?= $form->field($model, 'ingredient3')->widget(Select2::classname(), [
                  'data' => $data,
                  'language' => 'ru',
                  'options' => ['placeholder' => 'Select a state ...'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],
                ]); ?>
                <?= $form->field($model, 'ingredient4')->widget(Select2::classname(), [
                  'data' => $data,
                  'language' => 'ru',
                  'options' => ['placeholder' => 'Select a state ...'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],
                ]); ?>
                <?= $form->field($model, 'ingredient5')->widget(Select2::classname(), [
                  'data' => $data,
                  'language' => 'ru',
                  'options' => ['placeholder' => 'Select a state ...'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],
                ]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-lg-8">

                <?php if(!empty($dishes)){?>
                    <h2>Результаты:</h2>
                    <?php foreach ($dishes as $item){?>
                      <h3><?=$item['title']?></h3>
                       <ul>
                        <?php foreach ($item['value'] as $value){?>
                          <li><?=$value?></li>
                        <?php }?>
                       </ul>
                    <?php }?>
                <?php }?>
            </div>
        </div>

    </div>
</div>
