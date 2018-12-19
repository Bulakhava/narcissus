<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route)
    {
         $this->route = $route;
           if(!$this->checkAcl()){
              View::errorCode(403);
           }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);


    }

    public function loadModel()
    {
        $path = 'application\models\\' . $this->route['model'];

        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl()
    {
         $this->acl = require 'application/acl/acl.php';

        if(isset($_SESSION['id']) and $_SESSION['id'] === 'admin'){
            $status = 'admin';
        }

         elseif (isset($_SESSION['id']) and $_SESSION['id'] != 'admin'){
            $status = 'authorized';
        }


        else {
            $status = 'guest';
        }

        // elseif (isset($_SESSION['authorize']['id'])){
        //     $status = 'authorize';
        // }

        // else $status = 'guest';


        if ($this->isAcl($status)) return true;
        else return false;

    }

    public function isAcl($status)
    {

      return in_array($this->route['action'], $this->acl[$status]);
    }

}
