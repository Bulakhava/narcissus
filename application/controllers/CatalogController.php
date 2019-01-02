<?php

namespace application\controllers;

use application\core\Controller;

class CatalogController extends Controller
{

    private $list;

    public function catalogAction()
    {

        $this->list = $this->model->getSortsList();

        $id = $this->getSortId();

        $sort = $this->model->getSort($id);

        $this->view->render('Каталог', [
            'page' => 'catalog',
            'list' => $this->list,
            'sort' => $sort[0],
            'imgPath' => $this->getImgPath($id),
            'id' => $id
        ]);

    }

    private function getSortId()
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


}