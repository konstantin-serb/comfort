<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_test".
 *
 * @property int $id
 * @property string $title
 * @property int|null $status
 * @property string|null $fonts
 * @property string|null $text
 */
class SiteTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['text'], 'string'],
            [['title', 'fonts'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'fonts' => 'Fonts',
            'text' => 'Text',
        ];
    }
}
