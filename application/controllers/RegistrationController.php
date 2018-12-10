<?php

namespace application\controllers;

use application\core\Controller;

class RegistrationController extends Controller

{
    public function registrationAction()
    {
        $this->view->render('Регистрация');
    }
}