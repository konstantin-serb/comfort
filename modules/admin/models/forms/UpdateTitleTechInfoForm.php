<?php

namespace app\modules\admin\models\forms;

use Yii;
use yii\base\Model;
use app\modules\admin\models\TechInfo;


class UpdateTitleTechInfoForm extends Model
{
    public $title;
    public $id;
    public $status;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'id'], 'required'],
            [['status'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'status' => 'Status',
        ];
    }


    public function save()
    {
        if ($this->validate()) {
            $tech = TechInfo::findOne($this->id);
            $tech->title = $this->title;
            $tech->status = $this->status;
            if($tech->save()){
                return true;
            }
        }
    }
}
