<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;

/** @var $this \yii\web\View */
/** @var $model \common\models\Providers */
/** @var $from ActiveForm */

?>

<div class="buh-Providers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provider_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
