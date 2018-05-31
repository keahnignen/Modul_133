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

}