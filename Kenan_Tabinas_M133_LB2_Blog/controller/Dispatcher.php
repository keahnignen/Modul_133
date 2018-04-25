<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 23/03/2018
 * Time: 22:01
 */

class Dispatcher
{

    public static $UserArea = "userarea";

    public static $Logout = "logout";



    public static function dispatch() {

        switch (GlobalVariables::$uriFragments[0])
        {
            case Dispatcher::$UserArea:

                
            default:
                ViewCreator::CreateHomepage();
        }
    }

}