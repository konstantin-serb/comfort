<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "projecttag".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 */
class Projecttag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projecttag';
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
