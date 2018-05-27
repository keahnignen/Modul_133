<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 23/03/2018
 * Time: 22:01
 */

class Dispatcher
{

    public static function dispatch() {

        $s = new GlobalVariables();

        switch (GlobalVariables::getUriFragments(0))
        {

            case Singleton::getUrl()->UserArea:
                $content = self::Userarea();
                break;

            case Singleton::getUrl()->Register:
                $content = UserController::CreateUser();
                break;
            case Singleton::getUrl()->Login:
                $content = UserController::Login();
                break;
            case Singleton::getUrl()->Logout:
                $content = UserController::Logout();
                break;
            default:
                $content = Homepage::Display();
        }

        ViewCreator::displayPage($content);
    }

    public static function moveTo($where)
    {
        header('Location: /' . $where);
    }

    public static function Userarea()
    {
        if (GlobalVariables::$IsSessionIdSet)
        {
            if (GlobalVariables::getUriFragments(1) == Singleton::getUrlSegments()->NewGallery)
            {
                return Singleton::gallery()->CreateNewGallery();
            }

            if (GlobalVariables::getUriFragments(1) == Singleton::getUrlSegments()->saveGallery)
            {
                return Singleton::gallery()->CreateNewGallery();
            }

            return CreateView::user()->DisplayLoggedIn();
        }

        return CreateView::user()->Login();
    }

}