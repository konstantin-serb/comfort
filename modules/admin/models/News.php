<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

/**
 * This is the model class for table "news".
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
class News extends \yii\db\ActiveRecord
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
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'description'], 'string'],
            [['status', 'time_create', 'time_update', 'user_create', 'user_update', 'type_view'], 'integer'],
            [['slug', 'title', 'image', 'mini'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
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
        } else {
            return '/uploads/mini/no-image.jpg';
        }
    }


    public function getImage()
    {
        if ($this->mini) {
            return '/uploads/' . $this->image;
        } else {
            return '/uploads/no-image.jpg';
        }
    }
}
