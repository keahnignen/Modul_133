<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 21:02
 */

class View
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

    private static $gallery;

    public static function gallery()
    {
        if ( is_null( self::$gallery ) )
        {
            require_once "GalleryView.php";
            self::$gallery = new GalleryView();
        }
        return self::$gallery;
    }

    public static function FourOFour()
    {
        return "<h1>404 - Your page was not found, sorry</h1>";
    }

    public static function getLinkBox($link, $text)
    {
        $content = "";

        $content .= "<a href='\\". $link ."'>";
        $content .= "<div class='postBox'>";
        $content .= "<h1>". $text ."</h1>";
        $content .= "</div>";
        $content .= "</a>;";

        return $content;
    }
}