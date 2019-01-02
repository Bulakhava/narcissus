<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;
use application\lib\Image;

class EditSortController extends AdminController
{


    public function editSortAction()
    {

        $id = $this->getSortId();
        $sort = $this->model->getSort($id);

        if (!empty($_POST)) {
            $result = $this->model->editSort($_POST, $id);
            $this->view->message('', $result['message']);
            exit;
        }

        $this->view->render('Редактировать сорт', [
            'page' => 'editSort',
            'sort' => $sort[0],
            'imgPath' => $this->getImgPath($id),
        ]);

    }

    public function changeImgAction(){

             $id = $this->getSortId();
            $image = new Image('file');
            $result = $image->checkFile();


            if($result['status'] === 'error'){
                $this->view->message('error', $result['message']);
                exit;

            } else {
                $this->model->rmRec('img/sorts/' . $id);
                $image->uploadSortImage($image->getImg()['tmp_name'], $id);
                $this->view->location('/admin/edit-sort/' . $id);
            }

    }

    private function getSortId()
    {
        $tmp = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        return end($tmp);
    }

}