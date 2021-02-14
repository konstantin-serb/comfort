<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Category;
use app\modules\admin\models\ProductTag;
use yii\base\Model;
use Yii;

class CreateProductTagForm extends Model
{
    public $title;


    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'unique', 'targetClass' => ProductTag::class],
            [['title'], 'string', 'length' => [3,255]],
        ];
    }

    public function save()
    {

        if($this->validate()) {
            $cat = new ProductTag();
            $cat->title = $this->title;
            $cat->slug = $cat->createSlug($this->title);

            if ($cat->save()) {
                return Yii::$app->db->getLastInsertID();
            }

            return false;
        }
    }

}