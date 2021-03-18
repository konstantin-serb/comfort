<?php

namespace app\modules\admin\models;

use app\components\KotTranslit;
use Yii;

/**
 * This is the model class for table "subcategory".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $slug
 * @property int|null $category_id
 * @property int|null $order
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcategory';
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'slug' => 'Slug',
            'category_id' => 'Родительская категория',
            'order' => 'Порядок',
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


    public function getCategoryName()
    {
        $category = Category::findOne($this->category_id);
        return $category->title;
    }
}
