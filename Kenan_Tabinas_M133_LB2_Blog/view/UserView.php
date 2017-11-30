<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
 * Date: 25/11/2017
 * Time: 18:09
 */

class UserView extends MainView
{

    public function makeContent()
    {
        var_dump(self::$queryStrings);

        var_dump(self::$queryStrings);

        if (is_numeric(self::$queryStrings["id"]))
        {
            $repository = new UserRepository();
            $email = $repository->getUserById(self::$queryStrings["id"]);
            self::$content .= "<h1>{$email}</h1>";
            $repository = new PostRepository();
            self::$content = $this->getPostString($repository->getAllPostByUser(self::$queryStrings["id"]), self::$content);
        }

    }


}