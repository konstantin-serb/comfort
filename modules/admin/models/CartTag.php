<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cart_tag".
 *
 * @property int $id
 * @property int|null $cart_id
 * @property int|null $tag_id
 */
class CartTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart_tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cart_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_id' => 'Cart ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
