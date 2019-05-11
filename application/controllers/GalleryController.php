<?php

namespace application\controllers;

use application\core\Controller;

class GalleryController extends Controller
{
    private $list;

    public function galleryAction(){
        $this->list = $this->model->getSortsList();
        foreach ($this->list as &$item) {
            $item['imgSrc'] = $this->getImgPath($item['id']);
            $imagesGalDir = 'img/sorts/' . $item['id'] . '/gallery';
            $item['galleryImgLength'] = sizeof($this->getGalleryImgPath($imagesGalDir));
        }
        $this->view->render('Галерея', [
            'list' => $this->list
        ]);
    }
}