<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;

class FlowersListController extends AdminController {
     public function flowersListAction() {
    	$this->view->render('Список сортов', ['page'=>'flowersList']);
     }
}