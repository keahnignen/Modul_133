<?php
/**
 * Created by PhpStorm.
 * User: Keahnignen
 * Date: 16/12/2017
 * Time: 11:41
 */

class PostController
{
    function createNewPost()
    {

    }

    function deletePost($id)
    {
        $Confirmation = "<script> window.confirm('Are you sure to delete this post?');
        </script>";

        echo $Confirmation;

        if ($Confirmation == true) {


        }


    }

    function editPost($id)
    {

    }

}