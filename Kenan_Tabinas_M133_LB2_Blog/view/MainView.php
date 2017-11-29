<?php

/**
 * Created by PhpStorm.
 * UserView: Kenan
 * Date: 11.09.2017
 * Time: 07:57
 */

class MainView {


    protected static $content;

    protected static $queryStrings;

    protected static $uriFragments;

    public function __construct()
    {
       $this->initUriFragments();
       $this->initQueryString();
    }

    public function displayPage()
    {
        $this->dispatch();
        self::$content = $this->getNavbar() . self::$content . '</div>';
        echo str_replace('<!--THIS_WILL_BE_REPLACED-->', self::$content, $this->getLayout());
    }

    private function dispatch()
    {
        self::$content = '<div class="content">';

        if (!empty(self::$uriFragments[0])) {
            $viewName = self::$uriFragments[0];
            $viewName = ucfirst($viewName);
            $viewName .= 'View';
            $path = '..\\view\\'. $viewName .'.php';

            if (file_exists($path)) {

                require_once $path;

                $view = new $viewName();

                if (!is_null($view))
                {

                    $view->makeContent();
                    return;

                }

            }

        }
        $this->makeContents();
    }


    private function makeContents()
    {

        $repository = new UserRepository();
        $users = $repository->getAllUsers();
        self::$content .= "<h1>Users</h1>";

        foreach ($users as $user)
        {
            self::$content .= "<a href=\"/user?id={$user->id}\">";
            self::$content .= '<div class="userBox">';
            self::$content .= '<p>' . $user->email . '<p>' ;
            self::$content .= '</div>';
            self::$content .= '</a>';
        }


    }


    private function initUriFragments()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = strtok($uri, '?');
        $uri = trim($uri, '/');
        self::$uriFragments = explode('/', $uri);
    }

    private function getNavbar()
    {
        return file_get_contents('..\view\header.html');
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


    protected function initQueryString()
    {
        if (self::$queryStrings == null)
        {

            self::$queryStrings = array();

            if (!empty($_SERVER["QUERY_STRING"]))
            {
                foreach (explode('&', $_SERVER["QUERY_STRING"]) as $queryString )
                {

                    $queryStringFragments = explode('=', $queryString);
                    self::$queryStrings[$queryStringFragments[0]] = $queryStringFragments[1];
                }
            }
        }

    }


    protected function getPostString($posts, $content)
    {
        foreach ($posts as $post)
        {
            $content .= "<a href=\"/post?id={$post->id}\">";
            $content .= '<div class="postBox">';
            $content .= '<h2>' . $post->title . '</h2>';
            $content .= '<p>' . $post->text . '<p>' ;
            $content .= '<p>' . $post->date . '</p>';
            $content .= '</div>';
            $content .= '</a>';
        }
        return $content;
    }



}
