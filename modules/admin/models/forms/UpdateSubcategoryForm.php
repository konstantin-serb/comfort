<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Subcategory;
use yii\base\Model;
use Yii;

class UpdateSubcategoryForm extends Model
{
    public $title;
    public $order;
    public $categoryId;
    public $id;
    public $description;


    public function rules()
    {
        return [
            [['title', 'id', 'categoryId'], 'required'],
            [['title'], 'string', 'length' => [3,255]],
            [['order','id', 'categoryId'], 'integer'],
            [['description'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'slug' => 'Slug',
            'order' => 'Порядковый номер',
            'categoryId' => 'Родительская категория',
        ];
    }


    public function save()
    {

        if($this->validate()) {
            $cat = Subcategory::findOne($this->id);
            $cat->title = $this->title;
            $cat->slug = $cat->createSlug($this->title);
            $cat->order = $this->order;
            $cat->description = $this->description;
            $cat->category_id = $this->categoryId;

            if ($cat->save()) {
                return true;
            }

            return false;
        }
    }

}