<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var $this \yii\web\View */
/** @var $model \common\models\JournalSearch */
/** @var $form ActiveForm */
?>

<div class="buh-journal-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'buh_types_id') ?>

    <?= $form->field($model, 'provider_id') ?>

    <?= $form->field($model, 'date')->widget(DatePicker::class, [
        'convertFormat' => true,
        'options' => [
            'value' => $date,
        ],
        'pluginOptions' => [
            'format' => 'dd/MM/yyyy',
            'initialDate' => $date,
            'todayHighlight' => true,
            'todayBtn' => true,
        ],

    ])?>?>

    <div class="form-group">

        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>

    </div>
    <?php ActiveForm::end(); ?>
</div>
