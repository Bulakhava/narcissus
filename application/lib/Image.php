<?php

namespace application\lib;

use SplFileInfo;


class Image
{

    private $img;
    private $info;
    private $extensions_list = ['jpg', 'jpeg', 'png', 'gif', 'JPG', 'JPEG'];

    public function __construct($file)
    {
        $this->img = $_FILES[$file];
        $this->info = new SplFileInfo($this->img['name']);
    }

    public function getImg()
    {
        return $this->img;
    }


    public function checkFile()
    {

        if (empty($this->img['tmp_name'])) {
            return ['message' => 'Изображение не выбрано', 'status' => 'error'];
            exit;
        } elseif (!in_array($this->info->getExtension(), $this->extensions_list)) {
            return ['message' => 'Выбранный файл не является изображением', 'status' => 'error'];
            exit;
        } elseif ($this->img['size'] > 1024 * 3000) {
            return ['message' => 'Размер файла превышен', 'status' => 'error'];
            exit;
        }

        return ['message' => '', 'status' => 'success'];

    }


    public function uploadSortImage($path, $id)
    {
        mkdir('img/sorts/' . $id . '/main', 0777, true);
        move_uploaded_file($path, 'img/sorts/' . $id .'/main/' . $this->getImg()['name']);
        }


    public function uploadPostImage($path, $id)
    {
        mkdir('img/posts/' . $id , 0777, true);
        move_uploaded_file($path, 'img/posts/' . $id .'/' . $this->getImg()['name']);
    }


    public function addGalleryImage($path, $id)
    {

        $dir = 'img/sorts/' . $id . '/gallery';

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $image = $dir . '/' . $this->getImg()['name'];

        if (file_exists($image)) {
            return ['message' => 'Такая картинка уже есть', 'status' => 'error'];
        } else {
            move_uploaded_file($path, $image);
            return ['message' => '', 'status' => 'success'];
        }
    }

    public function addCategoryImage($path, $sort_id, $cat_id){
        $dir = 'img/sorts/' . $sort_id . '/category';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        $dir_cat = $dir . '/' . $cat_id;
        if (!file_exists($dir_cat)) {
            mkdir($dir_cat, 0777, true);
        }
        $image = $dir_cat . '/' . $this->getImg()['name'];
        if (file_exists($image)) {
            return ['message' => 'Такая картинка уже есть', 'status' => 'error'];
        } else {
            move_uploaded_file($path, $image);
            return ['message' => '', 'status' => 'success'];
        }
    }
}


