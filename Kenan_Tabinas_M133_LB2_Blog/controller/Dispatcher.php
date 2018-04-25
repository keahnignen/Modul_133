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
    public static $Login = "login";
    public static $Register = "register";

    public static function dispatch() {

        $s = new GlobalVariables();

        switch (GlobalVariables::$uriFragments[0])
        {

            case Dispatcher::$UserArea:
                $content = Area::Display();
                break;
            case Dispatcher::$Register:
                $content = UserController::CreateUser();
                break;
            default:
                $content = Homepage::Display();
        }

        ViewCreator::displayPage($content);
    }

}