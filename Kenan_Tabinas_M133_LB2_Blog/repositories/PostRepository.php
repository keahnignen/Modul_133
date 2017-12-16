<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
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
        $variable = $this->executeStatement($query);
        return $variable;
    }



    /**
     * @param $query string
     * @param $binds string
     * @param $questionMarks string
     * @return array
     * @throws Exception
     */

    private function executeStatement($query, $binds = null, $questionMarks = null)
    {
        $stmt = $this->prepareStatement($query, $binds, $questionMarks);

        $stmt->bind_result($id, $text, $topic_id, $user_id, $title, $date);

        $users = array();

        while ($stmt->fetch())
        {
            $postModel = new PostModel();
            $postModel->id = $id;
            $postModel->text = $text;
            $postModel->topic_id = $topic_id;
            $postModel->user_id = $user_id;
            $postModel->date = $date;
            $postModel->title = $title;
            array_push($users, $postModel);
        }

        return $users;
    }


    public function getAllPostByUser($id)
    {
        $query = "SELECT * FROM post where user_id = ?";
        return $this->executeStatement($query, $id, 's');
    }

    public function getPostById($id)
    {
        $query = "SELECT * FROM post where id = ?";
        return $this->executeStatement($query, $id, 's');
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM post WHERE id = ?";
    }

    public function editPost($content, $id)
    {
        $binds = array($content, $id);
        $query = "UPDATE post SET text = ? WHERE id = ?";
        return $this->prepareStatement($query, $binds, 'ss');
    }


}