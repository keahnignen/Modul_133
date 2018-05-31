<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 21:07
 */

class Controller
{
    private static $user;
    private static $gallery;

    public static function user()
    {
        if ( is_null( self::$user ) )
        {
            require_once "UserController.php";
            self::$user = new UserController();
        }
        return self::$user;
    }

    public static function gallery()
    {
        if ( is_null( self::$gallery ) )
        {
            require_once "GalleryController.php";
            self::$gallery = new GalleryController();
        }
        return self::$gallery;
    }
}