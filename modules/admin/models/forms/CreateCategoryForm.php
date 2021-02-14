<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Category;
use yii\base\Model;
use Yii;

class CreateCategoryForm extends Model
{
    public $title;


    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'length' => [3,255]],
        ];
    }

    public function save()
    {

        if($this->validate()) {
            $cat = new Category();
            $cat->title = $this->title;

            $cat->slug = $cat->createSlug($this->title);

            $count = 1;
            $allCat = Category::find()->count();
            $count = $allCat + 1;
            $cat->order = $count;

            if ($cat->save()) {
                return true;
            }

            return false;
        }
    }

}