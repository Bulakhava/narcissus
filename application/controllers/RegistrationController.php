<?php

namespace application\controllers;

use application\core\Controller;

class RegistrationController extends Controller {


    public function registrationAction()
    {
        if (!empty($_POST)) {
        if (!$this->model->validate(['firstName', 'lastName', 'email', 'password'], $_POST)) {
            $this->view->message('error', $this->model->error);
        }
        elseif ($this->model->checkEmailExists($_POST['email'])) {
            $this->view->message('error', 'Этот E-mail уже используется');
        }
        $this->view->message('success', 'Регистрация завершена, подтвердите свой E-mail');
    }
        $this->view->render('Регистрация');
    }



}