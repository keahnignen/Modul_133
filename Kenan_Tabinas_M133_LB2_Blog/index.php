<?php
/**
 * Created by PhpStorm.
 * User: Kenan
 * Date: 11.09.2017
 * Time: 07:55
 */

require_once 'view\View.php';
require_once 'repositories\MainRepository.php';
require_once 'repositories\UserRepository.php';
require_once 'repositories\PostRepository.php';
require_once 'model\UserModel.php';
require_once 'model\PostModel.php';



$viewObj = new View();
$viewObj -> displayPage();