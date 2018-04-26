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
        $ur = new UserRepository();

        $id = $ur->isPasswordCorrect($email, $password);

        if ($id == null)
        {
            return "Password or Email is wrong";
        }
        else {
            GlobalVariables::SetSessionId($id);
            header('Location: /' . Dispatcher::$UserArea);
            exit();
        }

    }

    public static function tryCreateUser($email, $password)
    {

        $s = self::isPasswordValid($password);

        if (!$s)
        {
            return "Password must have a Special Character, an upper- and a lowercase letter, a number and must have 8 characters";
        }

        $ur = new UserRepository();
        if ($ur->isEmailTaken($email))
        {
            return "Email is already Taken!";
        }

        $ur->addUser($email, $password);

        $id = $ur->getIdByEmail($email);

        GlobalVariables::SetSessionId($id);

        return self::$Registiert;

    }
    
    private static $Registiert = "Registerd";

    private static function isPasswordValid($password)
    {
        $regex = "(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})";
        return preg_match("/". $regex . "/", $password);
    }

    public static function CreateUser()
    {
        $b = self::tryCreateUser($_POST['email'], $_POST['password']);

        $asd = Area::Display();

        $asd .=   '<div class="floatClear"></div><div class="normalMessage"><h1>' . $b . "</h1></div>";
        return $asd;
    }

    public static function Login()
    {
        $b = self::isPasswordCorrect($_POST['email_login'], $_POST['password_login']);

        $asd = Area::Display();

        $asd .=   '<div class="floatClear"></div><div class="normalMessage"><h1>' . $b . "</h1></div>";
        return $asd;
    }


}