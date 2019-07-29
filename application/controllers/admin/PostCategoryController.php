<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;

class PostCategoryController extends AdminController
{
    public function addPostCategoryAction(){
         $this->model->postCategoryAdd($_POST);
         $this->view->message('success', 'Категория добавлена');
    }
}
