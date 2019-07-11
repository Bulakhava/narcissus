<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;
use application\lib\Image;

class AddSortController extends AdminController {

     public function addSortAction() {
          
          if (!empty($_POST)) {

              $image = new Image('file');

              $result = $image->checkFile();

               if($result['status'] === 'error'){
                       $this->view->message('error', $result['message']);
                       exit;

               } else {

                    $add = $this->model->sortAdd($_POST);

                     if($add['status'] === 'error'){
                         $this->view->message('error', $add['message']);
                         exit;
                     }  else{
                         $image->uploadSortImage($image->getImg()['tmp_name'], $add['id']);
                         $this->view->message('success', 'Сорт добавлен');
                     }
    
               }


      }

      $this->view->render('Добавить сорт',['page'=>'addSort']);

     }
}
