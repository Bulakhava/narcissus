<?php

namespace application\models;

use application\core\Model;

class Sort extends Model{

    public function sortAdd($post) {
        $params = [
            'id' => 0,
            'title' => $post['title'],
            'text' => $post['text'],
            'date' => time(),
            'has_categories' => null
        ];



             $this->db->query('INSERT INTO sorts VALUES (:id, :title, :text, :date, :has_categories)', $params);

            // print_r( $this->db->getError_info()[1]);

             if( $this->db->getError_info()[1] === 1062){
                  return ['message' => 'Сорт с таким названием уже существует', 'status' => 'error'];
                   exit;
             }

             return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

           //  return  $this->db->lastInsertId();
            
      }


}