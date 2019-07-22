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
        if (!$this->checkAcl()) {
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

        if (isset($_SESSION['id']) and $_SESSION['id'] === 'admin') {
            $status = 'admin';
        } elseif (isset($_SESSION['id']) and $_SESSION['id'] != 'admin') {
            $status = 'authorized';
        } else {
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

    protected function getImgPath($id)
    {
        $path = 'img/sorts/' . $id . '/main';
        $image = scandir($path, 1)[0];
        return ('/' . $path . '/' . $image);
    }

    protected function getImgPostPath($id)
    {
        $path = 'img/posts/' . $id;
        $image = scandir($path, 1)[0];
        return ('/' . $path . '/' . $image);
    }

    protected function getGalleryImgPath($path)
    {

      //  $path = 'img/sorts/' . $id . '/gallery';

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $images = scandir($path);
        $output = array_slice($images, 2);
        foreach ($output as $key => &$value) {
            $value = $path . '/' . $value;
        }
        return $output;
    }

    protected function getIdFromUrl()
    {
        $tmp = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
        return end($tmp);
    }



    protected function getDataFromUrlParams($str)
    {
        $params = $_SERVER['QUERY_STRING'];
        parse_str($params, $query);
        return $query[$str];
    }

}







