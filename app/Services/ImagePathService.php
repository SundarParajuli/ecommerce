<?php

namespace App\Services;

class ImagePathService
{
    public  function  imagePathservice($fullpath){
        $url_array = parse_url($fullpath);
        return $image_path= $url_array['path'];
    }
}
