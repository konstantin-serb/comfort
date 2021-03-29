<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_service".
 *
 * @property int $id
 * @property string $title
 * @property int|null $status
 * @property string|null $text
 * @property string|null $fonts
 */
class SiteService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_service';
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
            'title' => 'Название',
            'status' => 'Статус',
            'text' => 'Текст',
            'fonts' => 'Размер шрифта',
        ];
    }
}
