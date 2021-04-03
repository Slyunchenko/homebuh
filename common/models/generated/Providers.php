<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "providers".
 *
 * @property int $id
 * @property string|null $provider_name
 * @property string|null $account
 *
 * @property Journal[] $journals
 */
class Providers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'providers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provider_name'], 'string', 'max' => 255],
            [['account'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provider_name' => 'Provider Name',
            'account' => 'Account',
        ];
    }

    /**
     * Gets query for [[Journals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournals()
    {
        return $this->hasMany(Journal::className(), ['providers_id' => 'id']);
    }
}
