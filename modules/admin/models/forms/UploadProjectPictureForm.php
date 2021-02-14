<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\Project;
use Yii;
use yii\base\Model;
use app\components\Storage;

class UploadProjectPictureForm extends Model
{
    public $image;
    public $projectId;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
            [['projectId'], 'integer']
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/';
        $fileUpload->imageWidth = 800;
        $fileUpload->imageHeight = 350;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = Project::findOne($this->projectId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->image = $fileTableName;
            if ($image->save()) {
                if ($this->addMini($file)) {
                    return true;
                }

            }
        }
    }


    public function addMini($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'project/mini/';
        $fileUpload->imageWidth = 300;
        $fileUpload->imageHeight = 120;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = Project::findOne($this->projectId);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->mini = $fileTableName;

            if ($image->save()) {
                return true;
            }
        }
    }

}