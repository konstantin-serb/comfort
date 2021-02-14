<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carttag".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 */
class Carttag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carttag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
        ];
    }
}
