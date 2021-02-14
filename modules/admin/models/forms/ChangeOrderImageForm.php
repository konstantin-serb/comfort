<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\ImagesProduct;
use yii\base\Model;

class ChangeOrderImageForm extends Model
{
    public $sort;
    public $imageId;

    public function rules()
    {
        return [
            [['sort', 'imageId'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sort' => 'Сортировка',
        ];
    }


    public function save()
    {
        if($this->validate())
        {
            $image = ImagesProduct::findOne($this->imageId);
            $image->sort = $this->sort;
            if($image->save()) {
                return true;
            }
        }

    }

}