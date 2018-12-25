<?php

namespace application\lib;
use SplFileInfo;


class Image{

	private $img;
	private $info;
	private $extensions_list = ['jpg', 'jpeg', 'png', 'gif'];

    public function __construct($file){
        $this->img = $_FILES[$file];
        $this->info = new SplFileInfo($this->img['name']);
    }

   public function getImg(){
   	return $this->img;
   }


    public function checkFile(){

   	 if(empty($this->img['tmp_name'])){
   	 	return ['message' => 'Изображение не выбрано', 'status' => 'error'];
   	 	exit;
   	 }
     
     elseif(!in_array($this->info->getExtension(), $this->extensions_list)){
     	 return ['message' => 'Выбранный файл не является изображением', 'status' => 'error'];
     	 exit;
     }

     elseif($this->img['size'] > 1024 * 3000){
     	return ['message' => 'Размер файла превышен', 'status' => 'error'];
     	exit;
     }

     return ['message' => '', 'status' => 'success'];
  
   }


   public function uploadSortImage($path, $id) {

   	 mkdir('img/sorts/' . $id, 0777 , true);
     move_uploaded_file($path, 'img/sorts/' . $id .'/' . $this->getImg()['name']);

	}


}


    // [name] => 
    // [type] => 
    // [tmp_name] => 
    // [error] => 4
    // [size] => 0
