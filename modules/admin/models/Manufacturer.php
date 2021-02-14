<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property int $id
 * @property string|null $manufactured
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manufactured' => 'Производитель',
        ];
    }
}
