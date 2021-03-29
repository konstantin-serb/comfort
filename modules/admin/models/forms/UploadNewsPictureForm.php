<?php

namespace app\modules\admin\models\forms;

use Yii;
use yii\base\Model;
use app\components\Storage;
use app\modules\admin\models\News;

class UploadNewsPictureForm extends Model
{
    public $image;
    public $newsId;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
            [['newsId'], 'integer'],
            [['image'], 'required'],
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'news/';
        $fileUpload->imageWidth = 800;
        $fileUpload->imageHeight = 350;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $news = News::findOne($this->newsId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $news->image = $fileTableName;
            $news->type_view = News::WITH_IMAGE;
            if ($news->save()) {
                if ($this->addMini($file)) {
                    return true;
                }

            }
        }
    }


    public function addMini($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'news/mini/';
        $fileUpload->imageWidth = 400;
        $fileUpload->imageHeight = 200;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = News::findOne($this->newsId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->mini = $fileTableName;

            if ($image->save()) {
                return true;
            }
        }
    }

}