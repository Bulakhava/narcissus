<?php

namespace application\controllers;

use application\core\Controller;

class LikeController extends Controller
{

    public function postLikeAction()
        {
            $params = [
                'user_id' => $_SESSION['id'],
                'post_id' => $this-> getIdFromUrl()
            ];

            $add = $this->model->postLikeAdd($params);

          $this->view->message($add['status'], $add['message']);
        }
}
