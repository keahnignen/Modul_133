<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 21:20
 */

class GalleryController
{

    public function CreateNewGallery()
    {
        //TODO: Check values

        $name = GlobalVariables::getPost("title");
        $description = GlobalVariables::getPost("description");

        if ($name == null || $description == null)
        {
            return "Not all Fields were filled";
        }

        Repository::user()->addGallery(new GalleryModel(null, $name, $description, GlobalVariables::GetSessionId()));
        return true;
    }
}