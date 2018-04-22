<?php
/**
 * Created by PhpStorm.
 * UserView: Kenan
 * Date: 11.09.2017
 * Time: 07:55
 */


require_once '..\controller\Dispatcher.php';
require_once '..\controller\PostController.php';
require_once '..\controller\UserController.php';
require_once '..\model\UserModel.php';
require_once '..\model\PostModel.php';
require_once '..\repositories\MainRepository.php';
require_once '..\repositories\UserRepository.php';
require_once '..\repositories\PostRepository.php';

require_once '..\view\Navbar.php';
require_once '..\view\ViewCreator.php';
require_once '..\GlobalVariables.php';


session_start();

Dispatcher::dispatch();