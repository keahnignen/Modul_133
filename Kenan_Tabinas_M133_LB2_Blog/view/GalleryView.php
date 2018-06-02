<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 16:36
 */

class GalleryView
{

    public function CreateNewGallery($error = null)
    {
        return $this->EditGallery(Singleton::getUrl()->SaveGallery, "", "", $error);
    }

    public  function EditGallery($link, $title, $description, $error = null)
    {
        $content = file_get_contents('..\view\html\area\newGallery.html');

        $content = str_replace("<!--link-->", "/".$link, $content);
        $content = str_replace("<!--TITLE-VALUE-->", $title, $content);
        $content = str_replace("<!--CONTENT-VALUE-->", $description, $content);
        $content .= "<h2>" . $error . "</h2>";

        return $content;
    }

    public function DisplayGallery($id)
    {

        $gallery = Repository::gallery()->getGalleryById($id);
        $user = Repository::user()->getUserById($id);
        $content = "";
        if (!($gallery instanceof GalleryModel)) throw new Exception("Own Exception: inctance of failed");

        $content .= "<h1>" .  $gallery->name . "</h1>";
        $content .= "<a href='". Singleton::getUrlSegments()->User . $gallery->id ."'><h2>" .  $gallery->name . "</h2></a>";
        return $content;
    }

}