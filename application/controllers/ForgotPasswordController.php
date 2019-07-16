<?php

namespace application\controllers;
use application\core\Controller;

class ForgotPasswordController extends Controller {

    public function forgotPasswordAction() {

        if (!empty($_POST)) {
            $is_email = $this->model->checkEmailExists($_POST['email']);

           if(!$is_email){
               $this->view->message('error', 'Пользователя с таким email не существует');
               exit;
           } else {
               $resalt = $this->model->sendLinkForChangePassword($_POST['email']);
               $this->view->message($resalt['status'], $resalt['message']);
           }
        }

        $this->view->render('Забыли пароль',  []);

    }





}
