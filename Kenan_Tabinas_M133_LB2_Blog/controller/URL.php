<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 25/05/2018
 * Time: 23:05
 */

class URL
{
    public $UserArea;

    public $Logout;
    public $Login;
    public $Register;
    public $NewGallery;
    public $SaveGallery;
    public $ShowGallery;



    public function __construct()
    {
        $this->UserArea = Singleton::getUrlSegments()->userArea;
        $this->NewGallery = Singleton::getUrlSegments()->userArea . "\\" . Singleton::getUrlSegments()->NewGallery;
        $this->Register = Singleton::getUrlSegments()->Register;
        $this->Logout = Singleton::getUrlSegments()->Logout;
        $this->Login = Singleton::getUrlSegments()->Login;
        $this->SaveGallery = Singleton::getUrlSegments()->userArea . "\\" . Singleton::getUrlSegments()->saveGallery;
        $this->ShowGallery = Singleton::getUrlSegments()->ShowGallery;
    }

    public function AddPicture($gallery_id)
    {
        return $this->ShowGallery . "\\" . $gallery_id . "\\" . Singleton::getUrlSegments()->AddPicture;
    }

}


class URLFragments {

    public $userArea = "userarea";
    public $NewGallery = "newGallery";
    public $Logout = "logout";
    public $Login = "login";
    public $Register = "register";
    public $saveGallery = "saveGallery";
    public $ShowGallery = "gallery";
    public $User = "user";
    public $AddPicture = "addPicture";
}