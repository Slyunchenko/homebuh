<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this \yii\web\View */
/* @var $model \common\models\Journal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Buh Journal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buh-journal-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'metod' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'buhTypes.type',
            'providers.provider_name',
            'counter',
            'date',
        ],
    ]) ?>

</div>
