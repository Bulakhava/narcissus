<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;
use application\lib\Image;

class AddPostController extends AdminController {

    public function addPostAction() {

         if (!empty($_POST)) {
               $image = new Image('file');
               $result = $image->checkFile();
               if ($result['status'] === 'error') {
                     $this->view->message('error', $result['message']);
                     exit;
               } else {
                    $add = $this->model->postAdd($_POST);
                   if ($add['status'] === 'error') {
                        $this->view->message('error', $add['message']);
                        exit;
                    } else {
                        $image->uploadPostImage($image->getImg()['tmp_name'], $add['id']);
                        $this->view->message('success', 'Статья добавлена');
                    }
               }
            }
         $this->view->render('Добавить статью',['page'=>'addPost']);
    }

}
