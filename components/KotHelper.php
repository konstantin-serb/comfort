<?php


namespace app\components;


class KotHelper
{

    public static function selectHelper($object, $key, $val)
    {
        $value = '';
        foreach ($object as $item) {
            $value .= '<option value="'.$item->$key.'">'.$item->$val.'</option>';
        }
        return $value;
    }

}