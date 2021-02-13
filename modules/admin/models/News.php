<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $text
 * @property string|null $description
 * @property string|null $image
 * @property string|null $mini
 * @property int|null $status
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null $user_create
 * @property int|null $user_update
 * @property int|null $type_view
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'description'], 'string'],
            [['status', 'time_create', 'time_update', 'user_create', 'user_update', 'type_view'], 'integer'],
            [['slug', 'title', 'image', 'mini'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'mini' => 'Mini',
            'status' => 'Status',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'type_view' => 'Type View',
        ];
    }
}
