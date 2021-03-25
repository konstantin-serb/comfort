<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_company".
 *
 * @property int $id
 * @property string $title
 * @property int|null $status
 * @property string|null $fonts
 * @property string|null $text
 * @property string|null $text2
 * @property string|null $text3
 * @property string|null $image1
 * @property string|null $image2
 */
class SiteCompany extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['text', 'text2', 'text3'], 'string'],
            [['title', 'fonts', 'image1', 'image2'], 'string', 'max' => 255],
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
            'text2' => 'Text2',
            'text3' => 'Text3',
            'image1' => 'Image1',
            'image2' => 'Image2',
        ];
    }
}
