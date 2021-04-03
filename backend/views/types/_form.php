<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Providers;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\BuhTypes */
/* @var $form yii\widgets\ActiveForm */

$units = [
    'кВт' => 'кВт',
    'м^3' => 'м^3'
];
// Для выпадающего списка провайдеров испльзовать в паре с dropDownList
$providersModels = Providers::find()->all();
$providerList = ArrayHelper::map($providersModels, 'id', 'provider_name');
?>

<div class="buh-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'unit')->dropDownList($units) ?>
    <?= $form->field($model, 'price')->textInput(['type' => 'number', 'step' => '0.01']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
