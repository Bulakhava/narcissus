<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;

class AddSortController extends AdminController {
     public function addSortAction() {
    	$this->view->render('Добавить сорт',['page'=>'addSort']);
     }
}