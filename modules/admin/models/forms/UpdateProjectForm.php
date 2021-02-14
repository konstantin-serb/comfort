<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\Project;
use yii\base\Model;
use Yii;

class UpdateProjectForm extends Model
{
    public $id;
    public $title;
    public $description;
    public $text;
    public $status;
    public $type_view;

    public function rules()
    {
        return [
            [['title', 'id'], 'required'],
            [['title'], 'string', 'length' => [3,255]],
            [['description'], 'string', 'length' => [3, 500]],
            [['text'], 'string', 'min' => 2],
            [['type_view', 'id', 'status'], 'integer']
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Название',
            'text' => 'Текст',
            'description' => 'Описание',
            'image' => 'Изображение',
            'mini' => 'Миниатюра',
            'status' => 'Статус',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'user_create' => 'User Create',
            'user_update' => 'User Update',
            'type_view' => 'Тип показа',
        ];
    }


    public function save()
    {
        if($this->validate()) {
            $news = Project::findOne($this->id);
            $news->title = $this->title;
            $news->slug = $news->createSlug($this->title);
            $news->description = $this->description;
            $news->text = $this->text;
            $news->status = $this->status;
            $news->type_view = $this->type_view;
            $news->user_update = Yii::$app->user->identity->getId();
            $news->time_update = time();
            $news->status = $this->status;

            if ($news->save()) {
                return true;
            }

            return false;
        }
    }

}