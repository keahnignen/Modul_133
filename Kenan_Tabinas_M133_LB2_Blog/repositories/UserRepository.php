<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
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

        $stmt->bind_result($id, $username, $email, $password, $isAdmin, $picture_id);

        $users = array();

        while ($stmt->fetch())
        {
            $userModel = new UserModel();
            $userModel->id = $id;
            $userModel->username = $username;
            $userModel->email = $email;
            $userModel->password = $password;
            $userModel->isAdmin = $isAdmin;
            $userModel->picture_id = $picture_id;
            array_push($users, $userModel);
        }

        return $users;
    }


    public function isUsernameTaken()
    {
        return false;
    }

    public function isEmailTaken($email)
    {
        $query = "select email from user where email = ?";
        $stmt = $this->prepareStatement($query, $email, 's');
        $stmt->bind_result($bla);
        $stmt->fetch();

         return $bla != null;
    }

    public function getUsernameById($id)
    {
        return $this->getEmailById($id);
    }

    public function getUserByUsername()
    {

    }

    public function getAllEmails()
    {
        $query = "SELECT email FROM `user`";
        return $this->getOneColumn($query);
    }

    public function getAllUsernames()
    {
        return $this->getAllEmails();
    }

    public function getEmailById($id)
    {
        $query = "SELECT email FROM `user` WHERE id = ?";
        $stmt = $this->prepareStatement($query, $id, 's');
        $stmt->bind_result($email);
        $stmt->fetch();
        return $email;
    }

    public function getIdByEmail($email)
    {
        $query = "SELECT id FROM user where email = ?";
        return $this->getOneColumn($query, $email, 's');
    }

    public function addUser($email, $password)
    {
        $query = "insert into user (username, email, PASSWORD, isAdmin) VALUES (?, ?, ?, FALSE)";
        $binds = array("", $email, $password);
        $this->prepareStatement($query,  $binds, 'sss');
    }

    public function isPasswordCorrect($email, $password)
    {
        $query = "select id from user where email = ? and password = ?";
        $binds = array($email, $password);
        return $this->getOneColumn($query, $binds, 'ss');
    }

}