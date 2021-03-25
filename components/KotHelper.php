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

    public static function get_size( $bytes )
    {
        if ( $bytes < 1000 * 1024 ) {
            return number_format( $bytes / 1024, 2 ) . " KB";
        }
        elseif ( $bytes < 1000 * 1048576 ) {
            return number_format( $bytes / 1048576, 2 ) . " MB";
        }
        elseif ( $bytes < 1000 * 1073741824 ) {
            return number_format( $bytes / 1073741824, 2 ) . " GB";
        }
        else {
            return number_format( $bytes / 1099511627776, 2 ) . " TB";
        }
    }

}