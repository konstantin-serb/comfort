<?php

namespace app\modules\admin\models\faker;

use Faker\Factory;
//use Faker\Factory;
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

//rand(1, 5) случайное число
//$faker->text(rand(100, 200)) текст
//$faker->creditCardDetails массив данных о кредитной системе
//$faker->numberBetween(199,499)
//$faker->name.'<br>';
//$faker->firstNameMale.'<br>';
//$faker->address.'<br>';
//$faker->city.'<br>';
//$faker->country.'<br>';
//$faker->email.'<br>';
//$faker->password.'<br>';




}
