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
        return file_get_contents('view\layout.html');
    }

    private function getContent()
    {
        return file_get_contents('view\ticTacToe.html');
    }

}
