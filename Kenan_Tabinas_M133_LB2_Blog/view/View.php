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
        return file_get_contents('..\view\layout.html');
    }


    private function getFileName()
    {
        return "swag";
    }

    private function getContent()
    {
        $navbar = file_get_contents('..\view\header.html');

        $model = new PostRepository();

        var_dump($_SERVER['HTTP_HOST']);


        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        $uri = trim($uri, '/');
        $uriFragments = explode('/', $uri);

        switch ($uri)
        {
            case "/user";

            default;
                $content = '<div class="content">';
                $posts = $model->getAllPosts();
                foreach ($posts as $post)
                {
                    $content = $content . '<div class="postBox">';
                    $content = $content . '<p>' . $post->text . '<p>' ;
                    $content = $content . '</div>';
                }
        }


        $contentString = $navbar . $content . '</div>';
        return $contentString;
    }

}
