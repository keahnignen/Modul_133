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
        if (!GlobalVariables::$uriFragments[0])
        {
            ViewCreator::CreateHomepage();
        }
    }

}