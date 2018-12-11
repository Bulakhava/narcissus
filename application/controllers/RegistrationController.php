<?php

namespace application\controllers;

use application\core\Controller;

class RegistrationController extends Controller {


    public function registrationAction()
    {
        if (!empty($_POST)) {
        if (!$this->model->validate(['email', 'password'], $_POST)) {
            $this->view->message('error', $this->model->error);
        }
        elseif ($this->model->checkEmailExists($_POST['email'])) {
            $this->view->message('error', 'Этот E-mail уже используется');
        }
        $this->view->message('success', $this->model->register($_POST));
    }
        $this->view->render('Регистрация');
    }

    public function confirmAction(){
        $this->view->render('confirm');
    }

}