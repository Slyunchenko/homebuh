<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Providers;
use common\models\BuhTypes;
use kartik\date\DatePicker;

/**
 * @var $model \common\models\Journal
 */

$typeModels = BuhTypes::find()->all();
$typeList = ArrayHelper::map($typeModels, 'id', 'type');

$providersModel = Providers::find()->all();
$providerList = ArrayHelper::map($providersModel, 'id', 'provider_name');
$date = ($model->date ? (new \DateTime($model->date))->format('d/m/Y') : date('d/m/Y'));
?>

<div class = "buh-Journal-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'buh_types_id')->dropDownList($typeList) ?>
    <?= $form->field($model, 'providers_id')->dropDownList($providerList) ?>
    <?= $form->field($model, 'counter')->textInput(['maxlength'=> true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength'=> true]) ?>
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

    ])?>
    <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>