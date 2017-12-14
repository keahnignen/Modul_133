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

        if (isset(self::$uriFragments[1]))
        {

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
                case 'logout':
                    if (isset($_SESSION['id'])) session_destroy();
                    header('Location: /');
                    exit();


                case 'posts':
                    $this->displayManagePosts();
                    return;

                default:
                    break;
            }
        }

        if (isset($_SESSION['id']))
        {
            $this->userArea();
            return;
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
        self::$content .= file_get_contents('..\view\html\login.html');
    }


    private function displayManagePosts()
    {
        self::$content .= file_get_contents('..\view\html\area\posts');
    }


    public function userArea()
    {
        $u = new UserRepository();
        self::$headerText = ' Logout';
        self::$href = ' href="/logout" ';
        $html = file_get_contents('..\view\html\area.html');
        self::$content .= str_replace('<!--Username-->', $u->getUsernameById($_SESSION['id'][0]), $html);
    }
}