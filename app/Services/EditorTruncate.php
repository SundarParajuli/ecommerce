<?php

namespace App\Services;

class EditorTruncate
{

    function truncate($text, $length = 100, $ending = '')
    {
         return $trunk= substr(preg_replace('/<.*?>/', '',$text),0,$length).$ending;


    }
}

