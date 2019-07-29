<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller

{

    private $list;

    public function indexAction()
    {
        $this->list = $this->model->getFourPosts();

        foreach ($this->list as &$item) {
            $item['imgSrc'] = $this->getImgPostPath($item['id']);
        }

        $this->view->render('Нарцисс и К', [
            'list' => $this->list
        ]);
    }
}
