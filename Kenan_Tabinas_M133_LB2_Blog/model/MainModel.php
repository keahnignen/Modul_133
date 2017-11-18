<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 18/11/2017
 * Time: 15:17
 */

class MainModel
{
    protected $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('127.0.0.1', 'root', '', 'blog');
        if ($this->mysqli.mysqli_connect_errno())
        {
            throw new Exception("mysqli_connect_errno");
        }

    }
}