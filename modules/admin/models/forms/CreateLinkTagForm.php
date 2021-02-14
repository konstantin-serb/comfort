<?php


namespace app\modules\admin\models\forms;

use app\modules\admin\models\CartTag;
use yii\base\Model;
use Yii;

class CreateLinkTagForm extends Model
{
    public $tagId;
    public $cartId;


    public function rules()
    {
        return [
          [['tagId', 'cartId'], 'required'],
          [['tagId', 'cartId'], 'integer'],
        ];
    }

    public function save()
    {

        if($this->validate()) {
            $really = CartTag::find()->where(['cart_id' => $this->cartId])->all();
            $x = 0;
            if($really) {
                foreach($really as $item) {
                    if ($item->tag_id == $this->tagId) {
                        $x = $x + 1;
                    }
                }
            }
            if ($x == 0) {
                $link = new CartTag();
                $link->cart_id = $this->cartId;
                $link->tag_id = $this->tagId;

                if ($link->save()) {
                    return true;
                }
                return false;
            }
            return true;
        }
    }

}