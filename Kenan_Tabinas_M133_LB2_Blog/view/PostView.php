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

        if (isset(self::$queryStrings["id"])) {
            if (is_numeric(self::$queryStrings["id"])) {
                $repository = new PostRepository();
                self::$content = $this->getPostString($repository->getPostById(self::$queryStrings["id"]), self::$content);
            }
        }
    }


}