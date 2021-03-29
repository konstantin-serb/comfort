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
 * @property string|null $image3
 * @property integer|null $image2_visible
 * @property integer|null $image3_visible
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
            [['title', 'fonts', 'image1', 'image2', 'image3'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'status' => 'Статус',
            'fonts' => 'Размер шрифта',
            'text' => 'Текст1',
            'text2' => 'Текст2',
            'text3' => 'Текст3',
            'image1' => 'Изображение1',
            'image2' => 'Изображение2',
            'image3' => 'Изображение3',
        ];
    }
}
