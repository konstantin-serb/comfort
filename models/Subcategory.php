<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcategory".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property int|null $category_id
 * @property int|null $order
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'order'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'category_id' => 'Category ID',
            'order' => 'Order',
        ];
    }
}
