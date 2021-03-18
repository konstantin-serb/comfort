<?php

namespace app\models;

use Yii;
use yii\data\Pagination;


/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $text
 * @property string|null $description
 * @property string|null $info
 * @property float|null $price
 * @property string|null $model
 * @property int|null $manufacturer
 * @property int|null $availability
 * @property int|null $subcategory_id
 * @property int|null $status
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null $user_create
 * @property int|null $user_update
 * @property int|null $recommend
 */
class Cart extends \yii\db\ActiveRecord
{
    const STATUS_VISIBLE = 1;
    const STATUS_INVISIBLE = 0;
    const AVAILABILITY = 1;
    const NOT_AVAILABILITY = 0;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'description', 'info'], 'string'],
            [['price'], 'number'],
            [['manufacturer', 'availability', 'subcategory_id', 'status', 'time_create', 'time_update', 'user_create', 'user_update'], 'integer'],
            [['slug', 'title', 'model'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'text' => 'Text',
            'description' => 'Description',
            'info' => 'Info',
            'price' => 'Price',
            'model' => 'Model',
            'manufacturer' => 'Manufacturer',
            'availability' => 'Availability',
            'subcategory_id' => 'Subcategory ID',
            'status' => 'Status',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'recommend' => 'Рекоммендованные',
        ];
    }


    public function getMini()
    {
        $image = ImagesProduct::find()->where(['cart_id' => $this->id])->orderBy('sort')->one();
        if ($image) {
            return $image->getMini();
        } else {
            return '/uploads/no-image.jpg';
        }
    }

    public static function getMini2($id)
    {
        $image = ImagesProduct::find()->where(['cart_id' => $id])->orderBy('sort')->one();
        if ($image) {
            return $image->getMini();
        } else {
            return '/uploads/no-image.jpg';
        }
    }


    public function getImage()
    {
        $image = ImagesProduct::find()->where(['cart_id' => $this->id])->orderBy('sort')->one();
        if ($image) {
            return $image->getImage();
        } else {
            return '/uploads/no-image.jpg';
        }
    }



    public function getImages()
    {
        $images = ImagesProduct::find()->where(['cart_id' => $this->id])->orderBy('sort')->all();
        if ($images) {
            return $images;
        } else {
            return '';
        }
    }


    public function getManufacturer()
    {
        $manufacturer = Manufacturer::findOne($this->manufacturer);
        if($manufacturer) {
            return $manufacturer->manufactured;
        }
        return 'Производитель не указан';
    }


    public function checkAvailability()
    {
        if($this->availability == self::AVAILABILITY) {
            return '<img src="/images/available.svg" alt="">В наявності';
        } else {
            return '<img src="/images/not-available.svg" alt=""><span class="red-color">Немає в наявності</span>';
        }
    }


    public static function getAll($pageSize = 8, $subcategory_id)
    {
        // Вывод статей для пагинации
        $query = Cart::find()->where(['subcategory_id' => $subcategory_id])->andWhere(['status' => Cart::STATUS_VISIBLE])->orderBy('id desc');
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' =>$pageSize]);
        $carts = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['carts'] = $carts;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getAllFromTag($tag_id)
    {
        $tags = CartTags::find()->where(['tag_id' => $tag_id])->all();
        $index = 0;
        $cart = [];
        foreach($tags as $tag) {
            $oneCart = Cart::findOne($tag->cart_id);
            $cart += [$index => $oneCart];
            $index ++;
        }

        return $cart;
    }
}
