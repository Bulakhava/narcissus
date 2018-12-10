<?php

namespace application\models;

use application\core\Model;

class Main extends Model{

    public $error;

    public function contactValidata($post){

        $namelen = iconv_strlen($post['name']);
        $textlen = iconv_strlen($post['text']);

         if($namelen < 1 or $namelen > 40){
             $this->error = 'Имя должно содержать от 1 до 40 символов';
             return false;
         }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
             $this->error = 'Email указан неверно';
             return false;
        }elseif($textlen < 10 or $textlen > 500){
             $this->error = 'Сообщение должно содержать от 10 до 500 символов';
             return false;
         }
         return true;
    }

}