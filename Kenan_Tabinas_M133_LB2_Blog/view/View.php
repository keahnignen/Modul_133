<?php

/**
 * Created by PhpStorm.
 * User: Kenan
 * Date: 11.09.2017
 * Time: 07:57
 */

class View {

    public function displayPage()
    {
        echo str_replace('<!--THIS_WILL_BE_REPLACED-->', $this->getContent(), $this->getLayout());
    }

    private function getLayout()
    {
        return file_get_contents('view\Layout.html');
    }


    private function getFileName()
    {
        return "swag";
    }

    private function getContent()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);

        $model = new PostRepository();

        switch ($url)
        {
            default:

        }

        $navbar = file_get_contents('view\header.html');
        $bla = $this->getFileName();
        $swag = $model->getAllPosts();
        return $navbar;
    }
}
