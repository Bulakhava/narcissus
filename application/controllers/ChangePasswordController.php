<?php

namespace application\controllers;
use application\core\Controller;

class ChangePasswordController extends Controller {

    private $email;
    private $token;
    private $user_id;

    public function changePasswordAction() {

        $this->email = isset($_GET["email"]) ? $_GET["email"] : '';
        $this->token = isset($_GET["token"]) ? $_GET["token"] : '';
        $this->user_id = $this->model->findUserByEmailToken($this->email, $this->token);

        if (!empty($_POST)) {
            if($_POST['password'] != $_POST['repeatPassword']){
                $this->view->message('error', 'Пароли не совпадают');
                exit;
            } else {
                $result = $this->model->changePassword($_POST['password'], $this->user_id);
                $this->view->message('', $result['message'], $result['url']);
            }
        }

        if( $this->user_id) {
            $this->view->render('Смена пароля',  []);
        } else {
            $this->view->redirect('404');
        }

    }

}
