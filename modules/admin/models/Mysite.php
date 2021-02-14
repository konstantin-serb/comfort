<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "mysite".
 *
 * @property int $id
 * @property string|null $tel_kyiv
 * @property string|null $tel_voda
 * @property string|null $tel_life
 * @property string|null $address
 * @property string|null $email
 * @property string|null $fb
 * @property string|null $insta
 * @property string|null $in
 * @property string|null $title_main
 * @property string|null $title_main2
 * @property string|null $title_about
 * @property string|null $image_main
 * @property string|null $image_about
 * @property string|null $mini_about
 * @property string|null $text_main
 * @property string|null $text_about1
 * @property string|null $text_about2
 */
class Mysite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mysite';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_main', 'text_about1', 'text_about2'], 'string'],
            [['tel_kyiv', 'tel_voda', 'tel_life', 'address', 'email', 'fb', 'insta', 'in', 'title_main', 'title_main2', 'title_about', 'image_main', 'image_about', 'mini_about'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel_kyiv' => 'Телефон Киевстар',
            'tel_voda' => 'Телефон Водафон',
            'tel_life' => 'Телефон Лайф',
            'address' => 'Адрес',
            'email' => 'Email',
            'fb' => 'Ссылка фейсбук',
            'insta' => 'Ссылка Insta',
            'in' => 'Ссылка In',
            'title_main' => 'Заголовок на главной',
            'title_main2' => 'Заголовок на главной2',
            'title_about' => 'Заголовок о нас',
            'image_main' => 'Image Main',
            'image_about' => 'Image About',
            'mini_about' => 'Mini About',
            'text_main' => 'Текст на главной',
            'text_about1' => 'Текст о нас1',
            'text_about2' => 'Текст о нас2',
        ];
    }

}
