<?php
/**
 * Created by PhpStorm.
 * UserView: Kenan
 * Date: 11.09.2017
 * Time: 07:55
 */

require_once '..\view\MainView.php';
require_once '..\repositories\MainRepository.php';
require_once '..\repositories\UserRepository.php';
require_once '..\repositories\PostRepository.php';
require_once '..\model\UserModel.php';
require_once '..\model\PostModel.php';


session_start();

$viewObj = new MainView();
$viewObj -> displayPage();