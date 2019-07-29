<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;
use application\lib\Image;

class EditPostController extends AdminController
{
    public function editPostAction()
    {
        $id = $this->getIdFromUrl();
        $post = $this->model->getPost($id);

        if (!empty($_POST)) {
            $result = $this->model->editPost($_POST, $id);
            $this->view->message('', $result['message']);
            exit;
        }

        $this->view->render('Редактировать статью', [
             'page' => 'editPost',
             'post' => $post[0],
             'imgPath' => $this->getImgPostPath($id),
             'categories' => $this->model->getCategories()
        ]);
    }


    public function changePostImgAction()
    {

        $id = $this->getIdFromUrl();
        $image = new Image('file');
        $result = $image->checkFile();

        if ($result['status'] === 'error') {
            $this->view->message('error', $result['message']);
            exit;

        } else {
            $this->model->rmRec('img/posts/' . $id);
            $image->uploadPostImage($image->getImg()['tmp_name'], $id);
            $this->view->location('/admin/edit-post/' . $id);
        }

    }

}
