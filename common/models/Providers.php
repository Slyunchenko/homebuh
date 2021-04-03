<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "providers".
 *
 * @property int $id
 * @property string $provider_name
 * @property int $account
 */
class Providers extends generated\Providers
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => 'ID',
            'provider_name' => 'Поставщик услуг',
            'account' => 'Расчетный счет',
        ]);
    }
}
