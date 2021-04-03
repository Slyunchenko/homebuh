<?php

use yii\helpers\Html;

/** @var $this \yii\web\View */
/** @var $model \common\models\Journal */

$this->title = 'Create Journal Types';
$this->params['breadcrumbs'][] = ['label' => 'Journal Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buh-journal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model,]) ?>

</div>
