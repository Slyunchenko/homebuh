<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $model \common\models\Journal */

$this->title = 'Update Journal Types: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Journal Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view?id=' . $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buh-journal-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
