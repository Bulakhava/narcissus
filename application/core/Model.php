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
        return $s;
    }

    public function rmRec($path)
    {
        if (is_file($path)) return unlink($path);
        if (is_dir($path)) {
            foreach (scandir($path) as $p) if (($p != '.') && ($p != '..'))
                $this->rmRec($path . DIRECTORY_SEPARATOR . $p);
            return rmdir($path);
        }
        return false;
    }

}
