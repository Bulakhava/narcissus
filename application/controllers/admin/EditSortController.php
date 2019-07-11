<?php

namespace application\controllers\admin;

use application\controllers\admin\AdminController;
use application\lib\Image;

class EditSortController extends AdminController
{
    public function editSortAction()
    {
        $id = $this->getIdFromUrl();
        $sort = $this->model->getSort($id);
        $imagesGalDir = 'img/sorts/' . $id . '/gallery';
        $categories = $this->model->getCategories($id);

        foreach($categories as &$val){
             $path = 'img/sorts/' . $val['sort_id'] . '/category/' . $val['id'];
             $val['images'] = $this->getGalleryImgPath($path);
             }


        if (!empty($_POST)) {
            $result = $this->model->editSort($_POST, $id);
            $this->view->message('', $result['message']);
            exit;
        }

        $this->view->render('Редактировать сорт', [
            'page' => 'editSort',
            'sort' => $sort[0],
            'imgPath' => $this->getImgPath($id),
            'galleryImg' => $this->getGalleryImgPath($imagesGalDir),
            'categories' => $categories
        ]);

    }

    public function changeImgAction()
    {

        $id = $this->getIdFromUrl();
        $image = new Image('file');
        $result = $image->checkFile();

        if ($result['status'] === 'error') {
            $this->view->message('error', $result['message']);
            exit;

        } else {
            $this->model->rmRec('img/sorts/' . $id . '/main');
            $image->uploadSortImage($image->getImg()['tmp_name'], $id);
            $this->view->location('/admin/edit-sort/' . $id);
        }

    }

    public function addGalleryImgAction()
    {
        $id = $this->getIdFromUrl();
        $image = new Image('image');
        $result = $image->checkFile();
        if ($result['status'] === 'error') {
            $this->view->message('error', $result['message']);
            exit;
        } else {
            $addResalt = $image->addGalleryImage($image->getImg()['tmp_name'], $id);
            if ($addResalt['status'] === 'error') {
                $this->view->message('error', $addResalt['message']);
                exit;
            } else {
                $this->view->location('reload');
            }
        }
    }

    public function removeGalleryImgAction()
    {
        if (!empty($_POST)) {
            $path = json_decode($_POST['data'])->path;
            unlink($path);
            print_r('gfhgh');
        }
    }

    public function addCategoryAction()
    {
        if (!empty($_POST)) {
            $_POST['sort_id'] = $this->getIdFromUrl();
            $add = $this->model->categoryAdd($_POST);
            if ($add['status'] === 'error') {
                $this->view->message('error', $add['message']);
                exit;
            } else {
                $this->view->location('/admin/edit-sort/' . $this->getIdFromUrl());
            }
        }
    }

    public function deleteCategoryAction()
    {
        if (!empty($_POST)) {
            print_r($_POST);
            $this->model->deleteCategory($_POST['id'], $_POST['sort_id']);
            exit;
        }
    }

    public function addImgCategoryAction()
    {
        $image = new Image('image');
        $result = $image->checkFile();
        $params = [
            'sort_id' => $this->getIdFromUrl(),
            'cat_id' => $this->getDataFromUrlParams('cat_id')
        ];

        if ($result['status'] === 'error') {
            $this->view->message('error', $result['message']);
            exit;
        } else {
            $addResalt = $image->addCategoryImage($image->getImg()['tmp_name'], $params['sort_id'], $params['cat_id']);
            if ($addResalt['status'] === 'error') {
                $this->view->message('error', $addResalt['message']);
                exit;
            } else {
                $this->view->location('reload');
            }
        }

    }

}
