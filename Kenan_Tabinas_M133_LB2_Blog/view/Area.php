<?php
/**
 * Created by PhpStorm.
 * User: Kenan
 * Date: 25/04/2018
 * Time: 12:56
 */

class Area
{

    public static function Display()
    {

        if (GlobalVariables::$IsSessionIdSet)
        {
            return "<br><h1>You are logged in.</h1> <br> <h2>Pretty Boring huh?</h2>";
        }

        $fileName = file_get_contents('..\view\html\login.html');

        $file = str_replace("<!--login-->", "action='" . Dispatcher::$Login . "''", $fileName);

        $file = str_replace("<!--register-->", "action='" . Dispatcher::$Register . "''", $file);

        return $file;

    }

}