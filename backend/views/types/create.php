<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BuhTypes */

$this->title = 'Create Buh Types';
$this->params['breadcrumbs'][] = ['label' => 'Buh Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buh-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
