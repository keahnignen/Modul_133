<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 18/11/2017
 * Time: 14:53
 */

class UserRepository extends MainRepository
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM user";

        $stmt = $this->prepareStatement($query);

        $stmt->bind_result($id, $username, $email, $password, $isAdmin);

        $users = array();

        while ($stmt->fetch())
        {
            $userModel = new UserModel();
            $userModel->id = $id;
            $userModel->username = $username;
            $userModel->email = $email;
            $userModel->password = $password;
            $userModel->isAdmin = $isAdmin;
            array_push($users, $userModel);
        }

        return $users;
    }


    public function isUsernameTaken()
    {
        return false;
    }

    public function isEmailTaken()
    {
        return false;
    }

    public function getUserById($id)
    {
        return $this->getEmailById($id);
    }

    public function getUserByUsername()
    {

    }

    public function getEmailById($id)
    {
        var_dump($id);
        $query = "SELECT email FROM `user` WHERE id = ?";
        $stmt = $this->prepareStatement($query, $id, 's');
        $stmt->bind_result($email);
        return $email;
    }



}