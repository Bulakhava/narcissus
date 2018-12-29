<?php

namespace application\controllers;

use application\core\Controller;

class LoginController extends Controller {


    public function loginAction() {

    	 if (!empty($_POST)) {
    	 	$email = $this->model->clearString($_POST['email']);
    	 	$password = $this->model->clearString($_POST['password']);

             if($this->model->checkAdmin($email, $password)){
              	 $_SESSION['id'] = 'admin';
              	 $_SESSION['first_name'] = 'Admin';
              	 $this->view->location('/admin/flowers-list');
              } else {
              	$resalt = $this->model->checkLogin($email, $password);
              	if($resalt['status'] === 'error'){
                       $this->view->message('error', $resalt['message']);
              		exit;
              	} else {
              		$_SESSION['id'] = $resalt['id'];
              		$_SESSION['first_name'] = $resalt['first_name'];
                    $this->view->location('/');
              	}
              }
          }

            $this->view->render('Логин');
     
      }

      public function logoutAction(){
      	    unset($_SESSION["id"]);
      	    unset($_SESSION["first_name"]);
            $this->view->redirect('login');
      }

}  




// public function loginAction() {
// 		if (isset($_SESSION['admin'])) {
// 			$this->view->redirect('admin/add');
// 		}
// 		if (!empty($_POST)) {
// 			if (!$this->model->loginValidate($_POST)) {
// 				$this->view->message('error', $this->model->error);
// 			}
// 			$_SESSION['admin'] = true;
// 			$this->view->location('admin/add');
// 		}
// 		$this->view->render('Вход');
// 	}