<?php

namespace application\models;

use application\core\Model;

class PostCategory extends Model
{
    public function postCategoryAdd($post){

        $params = [
            'id' => 0,
            'name' => trim($post['name']),
            'count_post' => 0
        ];
       $this->db->query('INSERT INTO post_categories VALUES (:id, :name, :count_post)', $params);
       return ['id' => $this->db->lastInsertId(), 'status' => 'success'];
    }
}
