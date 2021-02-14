<?php

namespace app\modules\admin\models\faker;


/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $text
 * @property string|null $description
 * @property string|null $image
 * @property string|null $mini
 * @property int|null $status
 * @property int|null $time_create
 * @property int|null $time_update
 * @property int|null $user_create
 * @property int|null $user_update
 * @property int|null $type_view
 */
class Project extends \yii\db\ActiveRecord
{
    const STATUS_VISIBLE = 1;
    const STATUS_INVISIBLE = 0;
    const WITH_IMAGE = 10;
    const WITHOUT_IMAGE = 9;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }




}
