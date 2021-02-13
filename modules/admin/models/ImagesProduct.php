<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "images_product".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $mini
 */
class ImagesProduct extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'images_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'mini'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'mini' => 'Mini',
        ];
    }
}
