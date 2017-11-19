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

        $layout = file_get_contents('..\view\layout.html');

        $uri = $_SERVER['REQUEST_URI'];
        $uriFragments = explode('/', $uri);

        $begin = '<link href="';

        foreach ($uriFragments as $uriFragment)
        {
            $begin = $begin . '..\\';
        }

        $fullCssString = $begin . 'style.css" type="text/css" rel="stylesheet">';

        $layout = str_replace('<!--CSS-->', $fullCssString, $layout);

        return $layout;
    }


    private function getFileName()
    {
        return "swag";
    }

    private function getContent()
    {
        $navBar = file_get_contents('..\view\header.html');



        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        $uri = trim($uri, '/');
        $uriFragments = explode('/', $uri);

        $queryStrings = array();

        if (!empty($_SERVER["QUERY_STRING"]))
        {
            foreach (explode('&', $_SERVER["QUERY_STRING"]) as $queryString )
            {
                $queryStringFragments = explode('=', $queryString);
                $queryStrings[$queryStringFragments[0]] = $queryStringFragments[1];
            }
        }

        $content = '<div class="content">';

        switch ($uriFragments[0])
        {

            case "post":
                if (isset($queryStrings["id"])) {
                    if (is_numeric($queryStrings["id"])) {
                        $repository = new PostRepository();
                        $content = $this->getPostString($repository->getPostById($queryStrings["id"]), $content);
                    }
                }
                break;


            case "posts":
                if (isset($queryStrings["id"]))
                {
                    if (is_numeric($queryStrings["id"]))
                    {
                        $repository = new UserRepository();
                        $email = $repository->getUserById($queryStrings["id"]);
                        var_dump($email);
                        $content = $content . "<h1>{$email}</h1>";
                        $repository = new PostRepository();
                        $content = $this->getPostString($repository->getAllPostByUser($queryStrings["id"]), $content);
                    }
                }
                break;

            case "user":

                $content = $content . file_get_contents('..\view\login.html');
                break;

            default:

                $repository = new UserRepository();
                $users = $repository->getAllUsers();
                foreach ($users as $user)
                {
                    $content = $content . "<a href=\"/posts?id={$user->id}\">";
                    $content = $content . '<div class="userBox">';
                    $content = $content . '<p>' . $user->email . '<p>' ;
                    $content = $content . '</div>';
                    $content = $content . '</a>';
                }
        }



        $contentString = $navBar . $content . '</div>';
        return $contentString;
    }

    private function getPostString($posts, $content)
    {
        foreach ($posts as $post)
        {
            $content = $content . "<a href=\"/post?id={$post->id}\">";
            $content = $content . '<div class="postBox">';
            $content = $content . '<p>' . $post->text . '<p>' ;
            $content = $content . '</div>';
            $content = $content . '</a>';
        }
        return $content;
    }


}
