<?php

namespace application\controllers;

use application\core\Controller;

class ContactsController extends Controller {


    public function contactsAction() {

        $this->view->render('Контакты',  []);


    }

}
