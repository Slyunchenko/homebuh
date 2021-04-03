<?php

use yii\helpers\Html;

/** @var $this \yii\web\View */
/** @var $model \common\models\Providers */

$this->title = 'Create Providers Types';
$this->params['breadcrumbs'][] = ['label' => 'Providers Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="buh-providers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>