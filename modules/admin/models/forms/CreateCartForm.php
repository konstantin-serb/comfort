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
    public $mod;
    public $manufacturer;
    public $availability;
    public $subcategory_id;
    public $recommend;

    public function rules()
    {
        return [
            [['title', 'text', 'info', 'manufacturer', 'subcategory_id'], 'required'],
            [['title', 'mod'], 'string', 'length' => [3, 255]],
            [['description'], 'string', 'length' => [3, 500]],
            [['text', 'info'], 'string', 'min' => 2],
            [['price'], 'safe'],
            [['manufacturer', 'recommend', 'availability', 'subcategory_id'], 'integer']
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
            'mod' => 'Модель',
            'manufacturer' => 'Производитель',
            'availability' => 'Наличие на складе',
            'subcategory_id' => 'Подкатегория',
            'status' => 'Статус',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'recommend' => 'Рекомендованные',
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $cart = new Cart();
            $cart->title = $this->title;
            $cart->slug = $cart->createSlug($this->title);
            $cart->description = $this->description;
            $cart->text = $this->text;
            $cart->info = $this->info;
            $cart->price = 0.00;
            $cart->model = $this->mod;
            $cart->manufacturer = $this->manufacturer;
            $cart->availability = 1;
            $cart->subcategory_id = $this->subcategory_id;
            $cart->user_create = Yii::$app->user->identity->getId();
            $cart->time_create = time();
            $cart->status = Cart::STATUS_INVISIBLE;
            $cart->recommend = $this->calc();

            if ($cart->save()) {
                return $cart->slug;
            }

            return false;
        }
    }


    private function calc()
    {
        $calc = Cart::find()->count();
        return $calc + 1;
    }

}