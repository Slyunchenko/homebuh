<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "buh_types".
 *
 * @property int $id
 * @property string|null $type название статьи расходов
 * @property string|null $unit
 * @property float|null $price
 *
 * @property Journal[] $journals
 */
class BuhTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buh_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['type'], 'string', 'max' => 50],
            [['unit'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'unit' => 'Unit',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[Journals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournals()
    {
        return $this->hasMany(Journal::className(), ['buh_types_id' => 'id']);
    }
}
