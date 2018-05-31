<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 31.05.2018
 * Time: 15:00
 */

class View
{

    private static $gallery;

    public static function gallery()
    {
        if ( is_null( self::$gallery ) )
        {
            self::$gallery = new GalleryView();
        }
        return self::$gallery;
    }
}