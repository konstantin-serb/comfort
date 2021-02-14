<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "images_product".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $mini
 * @property int|null $cart_id
 * @property int|null $sort
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
            [['cart_id', 'sort'], 'integer'],
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
            'cart_id' => 'Cart ID',
            'sort' => 'Sort',
        ];
    }
}
