<?php

namespace App\Http\Helpers;

class Helper
{
    public function getPath($path, $imagePath)
    {
        return 'storage/images/' . $path . '/' . $imagePath;
    }
}
