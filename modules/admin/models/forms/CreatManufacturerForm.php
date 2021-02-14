<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Manufacturer;
use yii\base\Model;
use Yii;

class CreatManufacturerForm extends Model
{
    public $manufactured;


    public function rules()
    {
        return [
            [['manufactured'], 'required'],
            [['manufactured'], 'unique', 'targetClass' => Manufacturer::class],
            [['manufactured'], 'string', 'length' => [3,255]],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'manufactured' => 'Производитель',
        ];
    }


    public function save()
    {

        if($this->validate()) {
            $man = new Manufacturer();
            $man->manufactured = $this->manufactured;

            if ($man->save()) {
                return true;
            }

            return false;
        }
    }

}