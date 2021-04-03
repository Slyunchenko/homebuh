<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

//MainBuhType - псевдоним
use common\models\generated\BuhTypes as MainBuhType;


/**
 * This is the model class for table "buh_types".
 *
 * @property int $id
 * @property string|null $type название статьи расходов
 */
class BuhTypes extends MainBuhType
{
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'type' => 'Статья',
            'unit' => 'единица измерения',
            'price' => 'цена, грн.'
        ]);
    }
}
