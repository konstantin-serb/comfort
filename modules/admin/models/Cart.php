<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $text
 * @property string|null $description
 * @property string|null $info
 * @property string|null $model
 * @property string|null $manufacturer
 * @property int|null $availability
 * @property int|null $subcategory_id
 * @property int|null $status
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null $user_create
 * @property int|null $user_update
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'description', 'info'], 'string'],
            [['availability', 'subcategory_id', 'status', 'time_create', 'time_update', 'user_create', 'user_update'], 'integer'],
            [['slug', 'title', 'model', 'manufacturer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Title',
            'text' => 'Text',
            'description' => 'Description',
            'info' => 'Info',
            'model' => 'Model',
            'manufacturer' => 'Manufacturer',
            'availability' => 'Availability',
            'subcategory_id' => 'Subcategory ID',
            'status' => 'Status',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
        ];
    }
}
