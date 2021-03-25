<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_tech".
 *
 * @property int $id
 * @property string $title
 * @property int|null $status
 * @property string|null $fonts
 */
class SiteTech extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_tech';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
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
        ];
    }
}
