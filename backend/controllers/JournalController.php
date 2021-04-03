<?php

namespace backend\controllers;

use common\models\ProvidersSearch;
use Yii;
use common\models\Journal;
use common\models\JournalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\YiiAsset;
use kartik\date\DatePicker;

class JournalController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        /*
        $model = Journal::findOne(5);
        $diff = Journal::find()->filterWhere(['<', 'id', $model->id])->orderBy('id DESC')->limit(1)->one();
        */

        $searchModel = new JournalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Journal();
        $model->loadDefaultValues();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->getSession()->setFlash('success', 'Запись добавлена');
            return $this->redirect('index');
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionExport()
    {
        $labels = [
            '#',
            'usluga',
            'provider',
            'counter',
            'price',
            'date'
        ];
        $file = implode(';', $labels) . "\r\n";
        $models = Journal::find()->all();
        /** @var Journal $model */
        foreach ($models as $model) {
            $bodyData = [
                $model->id,
                $model->buhTypes->type,
                $model->providers->provider_name,
                $model->counter,
                $model->price,
                $model->date,
            ];
            $file = $file . implode(';', $bodyData) . "\r\n";
            //$file .= implode(';', $bodyData); короткий вариант
        }


        // Export the data and prompt a csv file for download
        header('Content-Encoding: UTF-8');
        header('Content-type: text/plain; charset=UTF-8');
        header("Content-Disposition: attachment; filename=\"export.csv\"");
        echo "\xEF\xBB\xBF"; // UTF-8 BOM
        echo $file;

        exit();

        /*
         * дата;услуга;поставщик услуг;показания;тариф;сумма;
         * 11-03-2021;газ;Горгаз;100;4грн;400грн
         * 11-03-2021;газ;Горгаз;100;2грн;200грн
         * */
        /*1. Получить все записи из журнала
        2. в первой строчке создать названия полей
        3. в остальных - данные
        */
        //implode(';', [$model->id,
        //$model->buh_types_id,
        //$model->providers_id,
        //$model->price,
        //$model->date,
        //]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = Journal::findOne($id);
        if ($model !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрошенная страница не существует.');
    }
}
