<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 14:57
 */

class PictureRepository extends MainRepository
{
    /**
     * @param $Gallery GalleryModel
     * @throws Exception
     */
    public function addGallery($Gallery)
    {
        $query = "insert into Gallery (name, description, user_id) VALUES (?, ?, ?)";
        $binds = array($Gallery->name, $Gallery->description, $Gallery->user_id);
        $this->execute($query,  $binds, 'ssi');
    }


    private function executeQuery($query, $binds = null, $questionMarks = null)
    {


        $stmt = $this->execute($query, $binds, $questionMarks);

        $stmt->bind_result($path, $gallery_id, $thumbnail);

        $pictures = array();

        while ($stmt->fetch())
        {
            $picture = new PictureModel($path, $gallery_id, $thumbnail);
            array_push($pictures, $picture);
        }

        return $pictures;
    }

    public function getAllPicturesByGalleryId($id)
    {
        $query = "SELECT * FROM picture where gallery_id = ?";
        return $this->executeQuery($query, $id, "i");
    }



}