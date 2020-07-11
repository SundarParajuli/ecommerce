<?php
/**
 * Created by PhpStorm.
 * User: manojaryal
 * Date: 2019-03-23
 * Time: 15:16
 */

namespace App\Helpers;
use InterventionImage;

class RaraImageHelper
{
    const COVER_IMAGE_THUMBNAIL_FOLDER = 'cover-thumbnail';
    const THUMBNAIL_DEFAULT_QUALITY = 75;

    public static function generateThumbnail($imageFile, $saveToDestination)
    {
        $width = 300;
        $height = null;
        $resizedImage = RaraImageHelper::resizeImage($imageFile, $width, null);
        RaraImageHelper::saveImage($resizedImage, $saveToDestination, self::THUMBNAIL_DEFAULT_QUALITY);
    }

    public static function featureImage($imageFile, $saveToDestination){
        $width = 800;
        $height = 600;
        $standardImage = RaraImageHelper::resizeImage($imageFile, $width, $height);
        RaraImageHelper::saveImage($standardImage, $saveToDestination);
    }

    /**
     * @param $imageFile - image file of type @see InterventionImage (refer to config/app.php)
     * @param $width
     * @param null $height - defaults to null
     * @return mixed
     */
    public static function resizeImage($imageFile, $width=null, $height= null)
    {
        $image = InterventionImage::make($imageFile);
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        return $image;
    }

    private static function resizeToFit($image, $width, $height)
    {
        $image->fit($width, $height, function ($constraint) {
            $constraint->upsize();
        }, 'top-left');
        return $image;
    }

    private static function saveImage($imageFile, $destination, $quality)
    {
        $imageFile->save($destination, $quality);
    }


}