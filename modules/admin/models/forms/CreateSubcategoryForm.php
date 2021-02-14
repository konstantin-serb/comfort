<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Subcategory;
use yii\base\Model;
use Yii;

class CreateSubcategoryForm extends Model
{
    public $title;
    public $categoryId;


    public function rules()
    {
        return [
            [['title', 'categoryId'], 'required'],
            [['title'], 'unique', 'targetClass' => Subcategory::class],
            [['title'], 'string', 'length' => [3,255]],
            [['categoryId'], 'integer'],
        ];
    }

    public function save()
    {

        if($this->validate()) {
            $cat = new Subcategory();
            $cat->title = $this->title;
            $cat->slug = $cat->createSlug($this->title);

            $count = 1;
            $allCat = Subcategory::find()->where(['category_id' => $this->categoryId])->count();
            $count = $allCat + 1;
            $cat->order = $count;

            $cat->category_id = $this->categoryId;

            if ($cat->save()) {
                return Yii::$app->db->getLastInsertID();
            }

            return false;
        }
    }

}