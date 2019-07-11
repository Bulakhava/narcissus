<?php

namespace application\controllers;

use application\core\Controller;

class CommentController extends Controller {

    public function addSortCommentAction() {

        if (!empty($_POST)) {

            $params = [
                'text' => $_POST['comment'],
                'userId' => $_SESSION['id'],
                'sortId' => $this-> getIdFromUrl()

            ];

            $add = $this->model->commentAdd($params);

            if($add['status'] === 'error'){
                $this->view->message('error', $add['message']);
                exit;
            }  else{
                $this->view->location('/catalog/' . $params['sortId']);
            }

        }

    }

    public function deleteSortCommentAction()
    {
        if (!empty($_POST)) {
            $this->model->deleteSortComment($_POST['id']);
            exit;
        }
    }



}

