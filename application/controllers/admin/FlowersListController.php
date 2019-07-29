<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;

class FlowersListController extends AdminController
{

    public function flowersListAction()
    {
        $list = $this->model->getSortsList();
        $this->view->render('Список сортов', [
            'page' => 'flowersList',
            'list' => $list
        ]);
    }

    public function deleteSortAction()
    {
        if (!empty($_POST)) {
            $this->model->deleteSort($_POST['id']);
            exit;
        }
    }

}
