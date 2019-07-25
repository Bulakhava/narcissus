<?php

namespace application\controllers;

use application\core\Controller;

class GuestPhotoController extends Controller{

    public function guestPhotoAction(){
        $this->view->render('Фото гостей', []);
    }

}
