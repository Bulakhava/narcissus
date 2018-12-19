<?php

namespace application\controllers;

use application\core\Controller;

class RegistrationController extends Controller {


    public function registrationAction()
    {
        if (!empty($_POST)) {

        if($_POST['password'] != $_POST['repeatPassword']){
            $this->view->message('error', 'Пароли не совпадают');
            exit;
        }

        elseif (!$this->model->validate(['email', 'password'], $_POST)) {
            $this->view->message('error', $this->model->error);
            exit;
        }
        elseif ($this->model->checkEmailExists($_POST['email'])) {
            $this->view->message('error', 'Этот E-mail уже используется');
            exit;
        }
        
        $resalt = $this->model->register($_POST);

        $this->view->message($resalt['status'], $resalt['message']);
    }
        $this->view->render('Регистрация');
    }

}