<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 18/11/2017
 * Time: 14:53
 */

class UserModel extends MainModel
{

    public function __construct()
    {
        parent::__construct();
    }

    private function getAllUsers()
    {
        $query = "SELECT * FROM user";
        $stmt = $this->mysqli->prepare($query);
        if ($stmt == false)
        {
            throw new Exception("Statement prepare Error");
        }
        if
    }
}