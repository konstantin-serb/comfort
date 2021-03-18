<?php


namespace app\modules\admin\models\forms;

use yii\base\Model;
use app\modules\admin\models\Cart;
use app\components\KotTranslit;
use Yii;

class UpdateCartForm extends Model
{
    public $id;
    public $title;
    public $description;
    public $text;
    public $info;
    public $price;
    public $model;
    public $manufacturer;
    public $availability;
    public $subcategory_id;
    public $status;
    public $recommend;

    public function rules()
    {
        return [
            [['title', 'text', 'info', 'price', 'manufacturer', 'availability','subcategory_id', 'status'], 'required'],
            [['title', 'model'], 'string', 'length' => [3,255]],
            [['description'], 'string', 'length' => [3, 500]],
            [['text', 'info'], 'string', 'min' => 2],
            [['price'], 'safe'],
            [['id','manufacturer', 'recommend', 'availability', 'subcategory_id' , 'status'], 'integer']
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
            'recommend' => 'Рекомендованные',
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $cart = Cart::findOne($this->id);
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
            $cart->user_update = Yii::$app->user->identity->getId();
            $cart->time_update = time();
            $cart->status = $this->status;
            $cart->recommend = $this->recommend;

            if ($cart->save()) {
                return true;
            }

            return false;
        }
    }

}