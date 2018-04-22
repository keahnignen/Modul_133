<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 26/11/2017
 * Time: 15:13
 */

class UserController
{
    public static function isPasswordCorrect($email, $password)
    {
        return true;
    }

    public static function tryCreateUser($email, $password)
    {

        if (self::isPasswordValid($password))
        {

        }

        $ur = new UserRepository();
        if ($ur->isEmailTaken($email))
        {
            return "Email is already Taken!";
        }


    }

    private static function isPasswordValid($password)
    {
        $regex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";
        $bla = preg_match($regex, $password);
        var_dump($bla);
        die();
    }


}