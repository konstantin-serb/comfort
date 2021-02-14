<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Category;
use yii\base\Model;
use Yii;

class UpdateCategoryForm extends Model
{
    public $title;
    public $order;
    public $id;


    public function rules()
    {
        return [
            [['title', 'id'], 'required'],
            [['title'], 'string', 'length' => [3,255]],
            [['order','id'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'slug' => 'Slug',
            'order' => 'Порядковый номер',
        ];
    }


    public function save()
    {

        if($this->validate()) {
            $cat = Category::findOne($this->id);
            $cat->title = $this->title;
            $cat->slug = $cat->createSlug($this->title);
            $cat->order = $this->order;
            
            if ($cat->save()) {
                return true;
            }

            return false;
        }
    }

}