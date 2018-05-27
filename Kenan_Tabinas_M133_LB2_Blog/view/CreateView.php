<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 21:02
 */

class CreateView
{

    private static $user;


    public static function user()
    {
        if ( is_null( self::$user ) )
        {
            require_once "Area.php";
            self::$user = new Area();
        }
        return self::$user;
    }
}