*<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
 * Date: 18/11/2017
 * Time: 15:17
 */

class MainRepository
{
    protected $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli('127.0.0.1', 'root', '', 'blog');

        if (mysqli_connect_errno())
        {
            throw new Exception("mysqli_connect_errno");
        }

    }

    /**
     * @param $query
     * @param null $binds
     * @param null $questionMarks
     * @return mysqli_stmt
     * @throws Exception
     */

    protected function prepareStatement($query,  $binds = null, $questionMarks = null)
    {

        $stmt = $this->mysqli->prepare($query);

        if ($stmt == false) throw new Exception("Db prepare error");

        if ($binds != null && $questionMarks != null)
        {

            $stmt->bind_param($questionMarks, $binds);
        }

        if (!$stmt->execute()) throw new Exception("Execution error - Throwed Exception");

        return $stmt;
    }

    protected function getOneColumn($query, $binds = null, $questionMarks = null)
    {
        $stmt = $this->prepareStatement($query, $binds, $questionMarks);
        $stmt->bind_result($column);

        $columns = array();

        while ($stmt->fetch())
        {
            array_push($columns, $column);
        }
        return $columns;
    }


}