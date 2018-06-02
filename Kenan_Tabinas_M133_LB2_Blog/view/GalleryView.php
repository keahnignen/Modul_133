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

    public function DisplayGallery($gallery_id)
    {


        $gallery = Repository::gallery()->getGalleryById($gallery_id);



        $content = "";
        if (!($gallery instanceof GalleryModel)) throw new Exception("Own Exception: inctance of failed");
        $user = Repository::user()->getUserById($gallery->user_id);


        if (!($user instanceof UserModel)) throw new Exception("Own Exception: inctance of failed");

        $content .= "<h1>" .  $gallery->name . "</h1>";


        //TODO: Change in username
        //TODO: Attention: Two <br><br>s
        $content .= "<a href='\\". Singleton::getUrlSegments()->User . "\\" .  $gallery->user_id ."'><h2>" .  $user->email . "</h2></a><br><br>";



        if ($gallery->user_id == GlobalVariables::GetSessionId())
        {
            $content .=  View::getLinkBox(Singleton::getUrl()->AddPicture($gallery_id), "Add Picture");
        }

        foreach (Repository::picture()->getAllPicturesByGalleryId($gallery_id) as $picture)
        {
            if (!($picture instanceof PictureModel)) throw new Exception("Own Exception: inctance of failed");

            $content .= "<div class='postBox'>";
            $content .= "<img src='". $picture->path ."'/>";
            $content .= "</div>";
        }

        return $content;
    }

}