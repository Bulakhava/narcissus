<?php

namespace application\controllers;

use application\core\Controller;

class ConfirmController extends Controller {


    public function confirmAction() {

        $params = $_SERVER['QUERY_STRING'];
        parse_str($params, $query);

        if($this->model->checkTokenExists($query['email'], $query['token'])) {
              $this->model->activate($query['email']);
             $vars = [
                'text'=>'Вы успешно зарегистрировались!',
                'link' => '/login'
             ];

            $this->view->render('Подтверждение регистрации',  $vars);
        } else {
             $vars = [
                'text'=>'Невалидный токен. Пройдите повторную регистрацию',
                'link' => '/registration'
             ];
            $this->view->render('Невалидный токен!',  $vars);
        }

        
    }

}  