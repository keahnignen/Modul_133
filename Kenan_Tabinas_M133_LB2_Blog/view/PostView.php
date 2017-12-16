<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
 * Date: 25/11/2017
 * Time: 18:08
 */

class PostView extends MainView
{

    public function makeContent()
    {

        $this->addNormalPost();
    }

    public function addNormalPost()
    {
        var_dump("sd");
        if (isset(self::$queryStrings["id"])) {
            if (is_numeric(self::$queryStrings["id"])) {
                $repository = new PostRepository();
                self::$content = $this->getPostString($repository->getPostById(self::$queryStrings["id"]), self::$content);
            }
        }
    }

    public function addEditablePosts()
    {
        //var_dump(is_numeric($_SESSION["id"][0]));
        if (isset($_SESSION["id"][0])) {
            if (is_numeric($_SESSION["id"][0])) { //User-Id
                $repository = new PostRepository();
                self::$content = $this->getPostString($repository->getAllPostByUser($_SESSION["id"][0]), self::$content, true);
            }
        }
    }

}