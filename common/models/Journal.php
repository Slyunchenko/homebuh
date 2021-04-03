<?php

namespace common\models;



use kartik\date\DatePicker;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\validators\DateValidator;


/**
 * This is the model class for table "journal".
 *
 * @property int $id
 * @property string|null $buh_types_id
 * @property string|null $providers_id
 * @property int|null $counter
 */
class Journal extends generated\Journal
{
    /**
     * @var mixed|null
     */
    private $Providers;

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => 'ID',
            'buh_types_id' => 'Статья',
            'providers_id' => 'Поставшик',
            'counter' => 'Показатели счетчика',
            'date' => 'Дата',
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['counter', 'date'], 'required', 'message' => '{attribute} не может быть пустым'],
            ['date', 'filter', 'filter' => function ($value) {
                $parsedDt = date_create_from_format('d/m/Y', $value);
                if ($value && $parsedDt) {
                        $value = $parsedDt->format('Y-m-d');
                };
                return $value;
                }],
            ['counter', 'validateCounter']
        ]);
    }


    public function findPreviousRecord(): ?self
    {
        /** @var self $model */
        $model = self::find()->filterWhere(['<', 'id', $this->id])
            ->andFilterWhere(['=', 'buh_types_id', $this->buh_types_id])->orderBy('id DESC')->one();

        return $model;
    }

    public function validateCounter($attribute)
    {
        $model = $this->findPreviousRecord();
        if ($model && $model->$attribute > $this->$attribute) {
            $this->addError($attribute, 'Показатель счетчика не может быть меньше предыдущего');
        }
    }
}
