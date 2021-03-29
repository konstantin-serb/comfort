<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tech_info".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $format
 * @property string|null $size
 * @property string|null $link
 * @property int|null $status
 * @property int|null $type
 */
class TechInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tech_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['size'], 'string'],
            [['status', 'type'], 'integer'],
            [['title', 'format', 'link'], 'string', 'max' => 255],
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
            'format' => 'Format',
            'size' => 'Size',
            'link' => 'Link',
            'status' => 'Status',
            'type' => 'Type',
        ];
    }
}
