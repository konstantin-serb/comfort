<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\ImagesProduct;
use Yii;
use yii\base\Model;
use app\components\Storage;
use yii\web\UploadedFile;

class UploadTechinfoFilesForm extends Model
{
    public $file;
    public $techId;
    public $title;


    public function rules()
    {
        return [
            [['file'], 'file',
                'extensions' => ['jpg', 'png', 'doc', 'docx', 'xls', 'xlsx', 'pdf', 'svg'],
                'checkExtensionByMimeType' => true,
            ],
            [['techId'], 'integer'],
            [['file'], 'required'],
            [['title'], 'string'],
        ];
    }

    public function addFile($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'tech/';
//        $fileUpload->imageWidth = 900;
//        $fileUpload->imageHeight = 700;
//        $fileUpload->imageMethod = 'width';
//        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = new ImagesProduct();
        if ($fileTableName = $fileUpload->saveUploadedFile($file, $nameLength)) {
            $image->image = $fileTableName;
            $image->cart_id = $this->cartId;
            $allImages = ImagesProduct::find()->where(['cart_id' => $this->cartId])->count();
            $image->sort = $allImages + 1;
            if ($image->save()) {
                $id = Yii::$app->db->getLastInsertID();
                if ($this->addMini($file, $id)) {
                    return true;
                }
            }
        }
    }

}