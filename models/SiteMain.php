<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site_main".
 *
 * @property int $id
 * @property string $title
 * @property string|null $title2
 * @property string|null $text
 * @property string|null $image_main
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $image_map
 * @property string|null $tel1
 * @property string|null $tel2
 * @property string|null $tel3
 * @property string|null $email
 * @property string|null $address
 * @property string|null $fb1
 * @property string|null $fb2
 * @property string|null $fb3
 * @property string|null $fonts
 * @property string|null $meta_keywords
 * @property string|null $meta_description
 */
class SiteMain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_main';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'meta_keywords'], 'string'],
            [['title', 'meta_description', 'title2', 'image_main', 'image2', 'image3', 'image_map', 'tel1', 'tel2', 'tel3', 'email', 'address', 'fb1', 'fb2', 'fb3', 'fonts'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Главный заголовок',
            'title2' => 'Заголовок 2',
            'text' => 'Текст',
            'image_main' => 'Image Main',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image_map' => 'Image Map',
            'tel1' => 'Tel1',
            'tel2' => 'Tel2',
            'tel3' => 'Tel3',
            'email' => 'Email',
            'address' => 'Адрес',
            'fb1' => 'Fb1',
            'fb2' => 'Fb2',
            'fb3' => 'Fb3',
            'fonts' => 'Fonts',
            'meta_description' => 'Описание сайта',
            'meta_keywords' => 'Набор слов для поискав в интернете',
        ];
    }

    public function getImage($type)
    {
        $image = $this::findOne(1)->$type;

        if ($image) {
            return '/uploads/'.$image;
        } else {
            return '/uploads/no-image.jpg';
        }
    }
}
