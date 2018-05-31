<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.05.2018
 * Time: 15:25
 */

class Repository
{
    private static $gallery;

    public static function user()
    {
        if ( is_null( self::$gallery ) )
        {
            require_once "GalleryRepository.php";
            self::$gallery = new GalleryRepository();
        }
        return self::$gallery;
    }
}