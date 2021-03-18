<?php

namespace app\modules\admin\models\forms;

use app\modules\admin\models\ImagesProduct;
use Yii;
use yii\base\Model;
use app\components\Storage;

class UploadCartPictureForm extends Model
{
    public $image;
    public $cartId;


    public function rules()
    {
        return [
            [['image'], 'file',
                'extensions' => ['jpg', 'png'],
                'checkExtensionByMimeType' => true,
            ],
            [['cartId'], 'integer'],
            [['image'], 'required'],
        ];
    }

    public function addImage($file)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'cart/';
        $fileUpload->imageWidth = 900;
        $fileUpload->imageHeight = 700;
        $fileUpload->imageMethod = 'width';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = new ImagesProduct();
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
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


    public function addMini($file, $id)
    {
        $fileUpload = new Storage();
        $fileUpload->folder = 'cart/mini/';
        $fileUpload->imageWidth = 200;
        $fileUpload->imageHeight = 200;
        $fileUpload->imageMethod = 'crop';
        $fileUpload->imageQuality = 90;
        $nameLength = 15;

        $image = ImagesProduct::findOne($id);
        if ($fileTableName = $fileUpload->saveUploadedImage($file, $nameLength)) {
            $image->mini = $fileTableName;

            if ($image->save()) {
                return true;
            }
        }
    }

}