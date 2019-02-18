<?php

namespace application\models;

use application\core\Model;

class Category extends Model
{

    public function categoryAdd($post)
    {
        $params = [
            'id' => 0,
            'title' => trim($post['title']),
            'text' => trim($post['text']),
            'date' => time(),
            'sort_id' => $post['sort_id']
        ];

        $this->db->query('INSERT INTO categories VALUES (:id, :title, :text, :date, :sort_id)', $params);
        if ($this->db->getError_info()[1] === 1062) {
            return ['message' => 'Категория с таким названием уже существует', 'status' => 'error'];
            exit;
        }

        $params = [
            'has_categories' => true,
            'id' => $post['sort_id']
        ];

        $this->db->query('UPDATE sorts SET has_categories = :has_categories WHERE id = :id', $params);

        return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

    }

    public function deleteCategory($id, $sort_id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM categories WHERE id = :id', $params);
        $this->rmRec('img/sorts/' . $sort_id . '/category/' . $id);
    }


}