<?php

namespace App\Http\Helpers;

class Helper
{
    public static function getPath($path, $imagePath)
    {

        return 'storage/images/' . $path . '/' . $imagePath;
    }

    public static function escape_like($string)
    {
        $search = array('%', '_');
        $replace   = array('\%', '\_');

        return str_replace($search, $replace, $string);
    }
}
