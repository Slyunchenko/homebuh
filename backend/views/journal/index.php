<?php

use common\models\Providers;
use common\models\BuhTypes;
use common\models\Journal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this \yii\web\View */
/* @var $searchModel Journal */
/* @var $dataProvider \yii\data\ActiveDataProvider
 */

$this->title = 'Журнал';
$this->params['breadcrumbs'][] = $this->title;
$buhTypes = ArrayHelper::map(BuhTypes::find()->all(), 'id', 'type');
$providers = ArrayHelper::map(Providers::find()->all(), 'id', 'provider_name');
$getSummary = function (Journal $model, $price = null) {
    $prev = $model->findPreviousRecord();
    $prevprev = $prev ? $prev->findPreviousRecord() : null;
    $sumCounter = $prev ? $model->counter - $prev->counter : $model->counter;
    $color = 'success';
    $sum = $model->counter;
    if ($price) {
        $sumCounter = round($sumCounter * $model->price, 2);
        $sum = $sumCounter;
    }
    if ($prev && $prevprev) {
        $sumPrevCounter = $prev->counter - $prevprev->counter;
        if ($price) {
            $sumPrevCounter = round($sumPrevCounter * $prev->price, 2);
        }
        if ($sumCounter > $sumPrevCounter) {
            $color = 'danger';
        }
    }
    return "<span class=\"label label-$color\">$sum</span>";
}
?>

<div class="buh-journal-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить статью', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Экспорт в файл', ['export'], ['class'=> 'btn btn-danger'])?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'buh_types_id',
                'value' => function (Journal $model) {
                    return $model->buhTypes->type;
                },
                'filter' => $buhTypes
            ],
            [
                'attribute' => 'providers_id',
                'value' => function (Journal $model) {
                    return $model->providers->provider_name;
                },
                'filter' => $providers
            ],
            [
                'attribute' => 'counter',
                'format' => 'html',
                'value' => function (Journal $model) use ($getSummary) {
                    return $getSummary($model);
                },
            ],

            'price',
            [
                'attribute' => 'date',
                'value' => function (Journal  $model) {
                    return $model->date ? (new DateTime($model->date))->format('d/m/Y') : null;
                },
                'filter' => DatePicker::widget([
                    'name' => 'date',
                    'model' => $searchModel,
                    'convertFormat' => true,
                    'removeButton' => false,
                    'pluginOptions' => [
                        'format' => 'dd/MM/yyyy',
                        'todayHighlight' => true,
                        'todayBtn' => true,
                    ],
                ]),
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'label' => 'Summa',
                'format' => 'html',
                'value' => function (Journal $model) use ($getSummary){
                    return $getSummary($model, true);
                }
            ],
            ['class' => 'yii\grid\ActionColumn']
        ]
    ]); ?>
</div>
