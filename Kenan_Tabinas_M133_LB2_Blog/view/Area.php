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
            return "You are logged in.";
        }

        $fileName = file_get_contents('..\view\html\login.html');

        $file = str_replace("<!--login-->", "action='" . Dispatcher::$Login . "''", $fileName);

        $file = str_replace("<!--register-->", "action='" . Dispatcher::$Register . "''", $file);

        return $file;

    }

}