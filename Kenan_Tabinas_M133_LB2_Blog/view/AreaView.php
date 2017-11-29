<?php
/**
 * Created by PhpStorm.
 * UserView: Keahnignen
 * Date: 25/11/2017
 * Time: 18:06
 */

class AreaView extends MainView
{

    public function makeContent()
    {

        require_once '..\controller\UserController.php';

        $controller = new UserController();

        var_dump(isset($_SESSION['id']));

        if (isset(self::$uriFragments[1]))
        {

            if (isset($_SESSION['id']))
            {
                $this->userArea();
                return;
            }

            switch (self::$uriFragments[1])
            {
                case 'login':

                    if (isset($_POST['password_login']) && isset($_POST['email_login']))
                    {
                        var_dump('Varabile-Exsists');
                        if ($controller->isPasswordCorrect($_POST['email_login'], $_POST['password_login']))
                        {

                            $repo = new UserRepository();
                            $_SESSION['id'] = $repo->getIdByEmail($_POST['email_login']);
                            var_dump($repo->getIdByEmail($_POST['email_login']) . 'session id is set');
                            var_dump('<br> sdsa ');
                            header('Location: /area');
                            exit();
                        }
                        else
                        {
                            var_dump('NotSet');
                           $this->displayError('Password or Email is wrong');
                        }
                    }

                    break;
                default:
                    break;
            }
        }

        $this->displayLoginOrRegister();
        return;
    }


    private function displayError($error)
    {
        self::$content .= '<h1 class="">'. $error . '</h1>';
    }

    private function displayLoginOrRegister()
    {
        self::$content .= file_get_contents('..\view\login.html');
    }

    public function userArea()
    {

    }
}