<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProvidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поставщики услуг/расчетный счет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buh-providers-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить поставщика услуг', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'provider_name',
            'account',

            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]); ?>
</div>