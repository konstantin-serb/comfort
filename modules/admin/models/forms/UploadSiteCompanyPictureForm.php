<?php

namespace app\modules\admin\models\forms;

use app\models\SiteCompany;
use yii\base\Model;
use app\components\Storage;

class UploadSiteCompanyPictureForm extends Model
{
    public $image;
    public $type;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
            [['type'], 'string'],
            [['image'], 'required'],
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        if ($this->type == 'image1') {
            $fileUpload->imageWidth = 1200;
            $fileUpload->imageHeight = 635;
        } elseif ($this->type == 'image2') {
            $fileUpload->imageWidth = 240;
            $fileUpload->imageHeight = 100;
        } elseif ($this->type == 'image3') {
            $fileUpload->imageWidth = 146;
            $fileUpload->imageHeight = 146;
        }
        $fileUpload->imageMethod = 'crop';
        $fileUpload->folder = 'site/';

        $fileUpload->imageQuality = 90;
        $nameLength = 15;
        $type = $this->type;

        $image = SiteCompany::findOne(1);
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