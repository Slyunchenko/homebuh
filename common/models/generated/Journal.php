<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "journal".
 *
 * @property int $id
 * @property int|null $buh_types_id
 * @property int|null $providers_id
 * @property float|null $counter
 * @property string|null $date
 * @property float|null $price
 *
 * @property BuhTypes $buhTypes
 * @property Providers $providers
 */
class Journal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'journal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['buh_types_id', 'providers_id'], 'integer'],
            [['counter', 'price'], 'number'],
            [['date'], 'safe'],
            [['buh_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => BuhTypes::className(), 'targetAttribute' => ['buh_types_id' => 'id']],
            [['providers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Providers::className(), 'targetAttribute' => ['providers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buh_types_id' => 'Buh Types ID',
            'providers_id' => 'Providers ID',
            'counter' => 'Counter',
            'date' => 'Date',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[BuhTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuhTypes()
    {
        return $this->hasOne(BuhTypes::className(), ['id' => 'buh_types_id']);
    }

    /**
     * Gets query for [[Providers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProviders()
    {
        return $this->hasOne(Providers::className(), ['id' => 'providers_id']);
    }
}
