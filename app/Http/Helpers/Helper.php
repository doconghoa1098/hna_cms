<?php

namespace App\Http\Helpers;

class Helper
{
    public function getPath($path, $imagePath)
    {
        return 'storage/images/' . $path . '/' . $imagePath;
    }

    public function escape_like($string)
    {
        $search = array('%', '_');
        $replace   = array('\%', '\_');
        return str_replace($search, $replace, $string);
    }
}
