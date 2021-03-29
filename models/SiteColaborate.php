<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_colaborate".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $status
 * @property string|null $text
 * @property string|null $description
 * @property string|null $link
 */
class SiteColaborate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_colaborate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['text', 'description'], 'string'],
            [['title', 'link'], 'string', 'max' => 255],
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
            'description' => 'Описание на ссылочном блоке',
            'text' => 'Текст',
            'link' => 'Размер шрифта',

        ];
    }
}
