<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 03.05.2018
 * Time: 14:57
 */

class GalleryRepository extends MainRepository
{
    /**
     * @param $Gallery GalleryModel
     * @throws Exception
     */
    public function addGallery($Gallery)
    {
        $query = "insert into Gallery (name, description, user_id) VALUES (?, ?, ?, ?)";
        $binds = array($Gallery->name, $Gallery->description, $Gallery->user_id);
        $this->execute($query,  $binds, 'ssi');
    }


    private function executeQuery($query, $binds = null, $questionMarks = null)
    {
        $stmt = $this->execute($query, $binds, $questionMarks);

        $stmt->bind_result($id, $name, $description, $user_id);

        $galleries = array();

        while ($stmt->fetch())
        {
            $galleryModel = new GalleryModel();
            $galleryModel->id = $id;
            $galleryModel->name = $name;
            $galleryModel->description = $description;
            $galleryModel->user_id = $user_id;
            array_push($galleries, $galleryModel);
        }

        return $galleries;
    }

    public function getAllGalleries()
    {
        $query = "SELECT * FROM gallery";
        return $this->executeQuery($query);
    }

}