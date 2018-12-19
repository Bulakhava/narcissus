<?php

namespace application\core;

use application\lib\Db;

abstract class Model
{
    public $db;

    public function __construct()
    {
     $this->db = new Db();
    }

    public function clearString($str){
    	$s = trim($str);
        $s = htmlspecialchars($s);
        // $s = mysql_escape_string($s);
        return $s;
    }

}
