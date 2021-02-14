<?php


namespace app\modules\admin\models\forms;

use yii\base\Model;
use app\modules\admin\models\Cart;
use app\components\KotTranslit;
use Yii;

class CreateCartForm extends Model
{
    public $title;
    public $description;
    public $text;
    public $info;
    public $price;
    public $model;
    public $manufacturer;
    public $availability;
    public $subcategory_id;

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'model'], 'string', 'length' => [3,255]],
            [['description'], 'string', 'length' => [3, 500]],
            [['text', 'info'], 'string', 'min' => 2],
            [['price'], 'safe'],
            [['manufacturer', 'availability', 'subcategory_id'], 'integer']
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
            'info' => 'Информация о товаре',
            'price' => 'Цена',
            'model' => 'Модель',
            'manufacturer' => 'Производитель',
            'availability' => 'Наличие на складе',
            'subcategory_id' => 'Подкатегория',
            'status' => 'Статус',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $cart = new Cart();
            $cart->title = $this->title;
            $cart->slug = $cart->createSlug($this->title);
            $cart->description = $this->description;
            $cart->text = $this->text;
            $cart->info = $this->info;
            $cart->price = $this->price;
            $cart->model = $this->model;
            $cart->manufacturer = $this->manufacturer;
            $cart->availability  = $this->availability;
            $cart->subcategory_id = $this->subcategory_id;
            $cart->user_create = Yii::$app->user->identity->getId();
            $cart->time_create = time();
            $cart->status = Cart::STATUS_INVISIBLE;

            if ($cart->save()) {
                return $cart->slug;
            }

            return false;
        }
    }

}