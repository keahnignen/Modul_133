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
        $stmt = $this->mysqli->prepare($query);

        if ($stmt == false) throw new Exception("db prepare error");

        //$stmt->bind_param('sss', $username,  $password, $email);

        if (!$stmt->execute()) throw new Exception("Exicution error");

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

    public function getUserById()
    {

    }

    public function getUserByUsername()
    {

    }



}