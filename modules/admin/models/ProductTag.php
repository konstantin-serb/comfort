<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

/**
 * This is the model class for table "carttag".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 */
class ProductTag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carttag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'slug' => 'Slug',
        ];
    }


    public function createSlug($word)
    {
        $slug = strtolower(KotTranslit::rusTranslit($word));
        $model = $this->find()->where(['slug' => $slug])->one();
        if (!$model || $model->id == $this->id) {
            return $slug;
        } else {
            return strtolower($slug . '-' . Yii::$app->security->generateRandomString(4));
        }
    }
}
