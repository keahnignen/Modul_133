<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 18/11/2017
 * Time: 23:52
 */

class PostRepository extends MainRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPosts()
    {
        $query = "SELECT * FROM post";
        $this->executeStatement($query);
    }



    /**
     * @param $query string
     * @param $binds string
     * @param $questionMarks string
     * @return array PostModels
     * @throws Exception
     */

    private function executeStatement($query, $binds = null, $questionMarks = null)
    {

        $stmt = $this->mysqli->prepare($query);

        if ($stmt == false) throw new Exception("db prepare error");

        if ($binds != null && $questionMarks != null)
        {
            $stmt->bind_param($questionMarks, $binds);
        }

        if (!$stmt->execute()) throw new Exception("Exicution error");

        $stmt->bind_result($id, $text, $topic_id, $user_id);

        $users = array();

        while ($stmt->fetch())
        {
            $userModel = new PostModel();
            $userModel->id = $id;
            $userModel->text = $text;
            $userModel->topic_id = $topic_id;
            $userModel->user_id = $user_id;
            array_push($users, $userModel);
        }

        return $users;
    }


    public function getAllPostByUser($id)
    {
        $query = "SELECT * FROM post where id = ?";
        return $this->executeStatement($query, $id, 's');
    }
}