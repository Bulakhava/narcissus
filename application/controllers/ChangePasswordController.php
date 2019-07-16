<?php

namespace application\controllers;
use application\core\Controller;

class ChangePasswordController extends Controller {

    private $email;
    private $token;

    public function changePasswordAction() {

        $this->email = isset($_GET["email"]) ? $_GET["email"] : '';
        $this->token = isset($_GET["token"]) ? $_GET["token"] : '';

        if (!empty($_POST)) {
            if($_POST['password'] != $_POST['repeatPassword']){
                $this->view->message('error', 'Пароли не совпадают');
                exit;
            } else {

              //  print_r(4444444);

             //  $this->model->changePassword($_POST['password'], $query['email']);
            }

        }

        if($this->model->checkTokenExists($this->email, $this->token)) {
            $this->view->render('Смена пароля',  []);
        } else {
            $this->view->redirect('404');
        }

    }

}
