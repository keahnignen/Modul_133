<?php

class Navbar
{

    public static function getNavbar()
    {

        if (!GlobalVariables::$IsSessionIdSet)
        {
            return self::getUserarea(self::$textUserArea, self::$linkUserArea);
        }
        return self::getUserarea(self::$textHeaderLogout, self::$linkHeaderLogout);

    }

    private static function getUserarea($text, $link)
    {
        $navbarHtml = file_get_contents('..\view\html\header.html');
        $newNavbarHtml = str_replace('<!--Header-->', $text, $navbarHtml);
        return str_replace('<!--href-->', $link, $newNavbarHtml);
    }


    private static $textHeaderLogout = " Logout";

    private static $linkHeaderLogout = "href = '\logout'";

    private static $textUserArea = " User Area";

    private static $linkUserArea = "href = '\userArea'";

}

