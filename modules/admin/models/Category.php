<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property int|null $order
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order'], 'integer'],
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
            'order' => 'Порядковый номер',
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
