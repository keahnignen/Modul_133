<?php

class Navbar
{

    public function __construct()
    {
        $this->linkHeaderLogout = "href = '\\" . Dispatcher::$Logout . "'";
        $this->linkUserArea = "href = '\\" . Dispatcher::$UserArea . "'";
    }

    public static function getNavbar()
    {
        $nav = new Navbar();

        if (GlobalVariables::$IsSessionIdSet && GlobalVariables::$uriFragments[0] == Dispatcher::$UserArea)
        {
            return self::getUserarea($nav->textHeaderLogout, $nav->linkHeaderLogout);

        }
        return self::getUserarea($nav->textUserArea, $nav->linkUserArea);


    }

    private static function getUserarea($text, $link)
    {
        $navbarHtml = file_get_contents('..\view\html\header.html');
        $newNavbarHtml = str_replace('<!--Header-->', $text, $navbarHtml);
        $newNavbarHtmlWithName = str_replace('<!--ApplicationName-->', GlobalVariables::$ApplicationName, $newNavbarHtml);
        return str_replace('<!--href-->', $link, $newNavbarHtmlWithName);
    }


    private $textHeaderLogout = " Logout";

    private $linkHeaderLogout;
    private $linkUserArea;
    private $textUserArea = " User Area";



}

