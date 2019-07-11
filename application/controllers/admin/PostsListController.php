<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;

class PostsListController extends AdminController
{

    public function postsListAction()
    {
           $list = $this->model->getPostsList();
           $this->view->render('Список статей', [
            'page' => 'postsList',
             'list' => $list
        ]);
    }

    public function deletePostAction()
    {
        if (!empty($_POST)) {
            $this->model->deletePost($_POST['id']);
            exit;
        }
    }

}
