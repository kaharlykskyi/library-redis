<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList($model->getClientsList()); ?>

    <?= $form->field($model, 'book_id')->dropDownList($model->getBooksList()); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
            'name' => 'year',
            'options' => ['placeholder' => 'Select published date'],
            'pluginOptions' => [
                'todayHighlight' => true
            ]
        ]
    ) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '0' => 'In rent',
        '1' => 'Available',
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
