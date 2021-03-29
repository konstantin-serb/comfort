<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

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
 * @property string|null $manufacturer
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
            [['availability', 'subcategory_id', 'status', 'time_create', 'time_update', 'user_create', 'recommend', 'user_update'], 'integer'],
            [['slug', 'title',  'model', 'manufacturer'], 'string', 'max' => 255],
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
            'recommend' => 'Sort',
        ];
    }


    public function getManufacturer()
    {
        $manufacturer = Manufacturer::findOne($this->manufacturer);
        return $manufacturer->manufactured;
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
    
    
    public function getSubcategory()
    {
        $sub = Subcategory::findOne($this->subcategory_id);
        return $sub->title;
    }



}
