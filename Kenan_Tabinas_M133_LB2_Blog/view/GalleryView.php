<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 27/05/2018
 * Time: 16:36
 */

class GalleryView
{

    public function CreateNewGallery()
    {
        return $this->EditGallery(Singleton::getUrl()->SaveGallery, "", "");
    }

    public  function EditGallery($link, $title, $description)
    {
        $content = file_get_contents('..\view\html\area\newGallery.html');

        $content = str_replace("<!--link-->", "/".$link, $content);
        $content = str_replace("<!--TITLE-VALUE-->", $title, $content);
        $content = str_replace("<!--CONTENT-VALUE-->", $description, $content);

        return $content;
    }

}