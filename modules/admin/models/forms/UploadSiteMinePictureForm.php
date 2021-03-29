<?php

namespace app\modules\admin\models\forms;

use app\models\SiteMain;
use yii\base\Model;
use app\components\Storage;

class UploadSiteMinePictureForm extends Model
{
    public $image;
    public $type;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png', 'svg'],
                'checkExtensionByMimeType' => true,
            ],
            [['type'], 'string'],
            [['image'], 'required'],
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        if ($this->type == 'image_main') {
            $fileUpload->imageWidth = 1200;
            $fileUpload->imageHeight = 635;
        } elseif ($this->type == 'image_map') {
            $fileUpload->imageWidth = 598;
            $fileUpload->imageHeight = 738;
        } elseif ($this->type == 'image2') {
            $fileUpload->imageWidth = 560;
            $fileUpload->imageHeight = 400;
        } elseif ($this->type == 'image3') {
            $fileUpload->imageWidth = 150;
            $fileUpload->imageHeight = 150;
        }
        $fileUpload->imageMethod = 'crop';
        $fileUpload->folder = 'site/';

        $fileUpload->imageQuality = 90;
        $nameLength = 15;
        $type = $this->type;

        $image = SiteMain::findOne(1);
        if(!$image->$type == null) {
            $current = $image->$type;
        } else {$current = null;}

        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength, $current)) {
            $image->$type = $fileTableName;
            if ($image->save()) {
                return true;
            }

        }

    }


}