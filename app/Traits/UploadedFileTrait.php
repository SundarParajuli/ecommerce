<?php

namespace App\Traits;

trait UploadedFileTrait
{
    public static function uploadFile($file, $destination)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . $destination, $fileName);

        return $fileName;
    }
}