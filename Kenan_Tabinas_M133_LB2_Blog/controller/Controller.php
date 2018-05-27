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


    public static function user()
    {
        if ( is_null( self::$user ) )
        {
            require_once "GalleryController.php";
            self::$user = new GalleryController();
        }
        return self::$user;
    }
}