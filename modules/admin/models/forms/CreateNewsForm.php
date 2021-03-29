<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\News;
use yii\base\Model;
use Yii;

class CreateNewsForm extends Model
{
    public $title;
    public $description;
    public $text;
    public $type_view;

    public function rules()
    {
        return [
            [['title', 'description', 'text'], 'required'],
            [['title'], 'string', 'length' => [3,255]],
            [['description'], 'string', 'length' => [3, 500]],
            [['text'], 'string', 'min' => 2],
            [['type_view'], 'integer']
        ];
    }


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


    public function save()
    {
        if($this->validate()) {
            $cart = new News();
            $cart->title = $this->title;
            $cart->slug = $cart->createSlug($this->title);
            $cart->description = $this->description;
            $cart->text = $this->text;
            $cart->type_view = News::WITHOUT_IMAGE;
            $cart->user_create = Yii::$app->user->identity->getId();
            $cart->time_create = time();
            $cart->status = News::STATUS_INVISIBLE;

            if ($cart->save()) {
                return Yii::$app->db->getLastInsertID();
            }

            return false;
        }
    }

}