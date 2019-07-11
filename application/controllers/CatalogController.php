<?php

namespace application\controllers;

use application\core\Controller;

class CatalogController extends Controller
{

    private $list;

    public function catalogAction()
    {
        $this->list = $this->model->getSortsList();
        $id = $this->getIdFromUrl();
        $sort = $this->model->getSort($id);
        $imagesGalDir = 'img/sorts/' . $id . '/gallery';
        $categories = $this->model->getCategories($id);
        $comments = $this->model->getComments($id);
        foreach ($comments as &$value) {
            $value['date_comment'] = date( 'd.m.Y',$value['time']);
        }
        $this->view->render($sort[0]['title'], [
            'page' => 'catalog',
            'list' => $this->list,
            'sort' => $sort[0],
            'imgPath' => $this->getImgPath($id),
            'id' => $id,
            'galleryImg' => $this->getGalleryImgPath($imagesGalDir),
            'categories' => $categories,
            'comments' => $comments
        ]);
    }

    public function getIdFromUrl()
    {
        $tmp = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $page_path = end($tmp);
        foreach ($this->list as $val) {
            if (in_array($page_path, $val)) {
                return $page_path;
            }
        }
        $key = array_search('Нарцисс', array_column($this->list, 'title'));
        $this->view->redirect( array_filter($tmp)[0] . '/' . $this->list[$key]['id']);
    }

    public function getGalleryImgAction(){
        if (!empty($_POST)) {
            $path = 'img/sorts/' . $_POST['id'] . '/gallery';
            $images = $this->getGalleryImgPath($path);
            print_r(json_encode($images));
        }
    }

}
