<?php

namespace App\Http\Service;

class EscapeService
{
    public function escape_like($string)
    {
        $search = array('%', '_');
        $replace   = array('\%', '\_');
        return str_replace($search, $replace, $string);
    }
}