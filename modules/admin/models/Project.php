<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

/**
 * This is the model class for table "project".
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
class Project extends \yii\db\ActiveRecord
{
    const STATUS_VISIBLE = 1;
    const STATUS_INVISIBLE = 0;
    const WITH_IMAGE = 10;
    const WITHOUT_IMAGE = 9;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Слаг',
            'title' => 'Название',
            'text' => 'Текст',
            'description' => 'Описание',
            'image' => 'Изображение',
            'mini' => 'Миниатюра',
            'status' => 'Статус',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'type_view' => 'Тип показа',
        ];
    }


    public function createSlug($word)
    {
        $slug = strtolower(KotTranslit::rusTranslit($word));
        $carts = $this->find()->where(['slug' => $slug])->one();
        if (!$carts || $carts->id == $this->id) {
            return $slug;
        } else {
            return strtolower($slug . '-' . Yii::$app->security->generateRandomString(4));
        }
    }

    public function getMini()
    {
        if ($this->mini) {
            return '/uploads/' . $this->mini;
        }
    }


    public function getImage()
    {
        if ($this->mini) {
            return '/uploads/' . $this->image;
        }
    }
}
