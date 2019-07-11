<?php

namespace application\models;

use application\core\Model;

class Sort extends Model
{

    public function sortAdd($post)
    {
        $params = [
            'id' => 0,
            'title' => trim($post['title']),
            'text' => trim($post['text']),
            'date' => time()
        ];

        $this->db->query('INSERT INTO sorts VALUES (:id, :title, :text, :date)', $params);
        if ($this->db->getError_info()[1] === 1062) {
            return ['message' => 'Сорт с таким названием уже существует', 'status' => 'error'];
            exit;
        }
        return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

    }


    public function editSort($post, $id){
        $params = [
            'id' => $id,
            'title' => trim($post['title']),
            'text' => trim($post['text']),
        ];
        $this->db->query('UPDATE sorts SET title = :title, text = :text WHERE id = :id', $params);
        if ($this->db->getError_info()[1] === 1062) {
            return ['message' => 'Сорт с таким названием уже существует', 'status' => 'error'];
            exit;
        }
        return ['message' => 'Сорт отредактирован', 'status' => 'success'];
    }


    public function getSortsList()
    {
        return $this->db->row('SELECT id, title FROM sorts ORDER BY title');
    }

    public function deleteSort($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM sorts WHERE id = :id', $params);
        $this->rmRec('img/sorts/' . $id);
    }

    public function getSort($id){
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM sorts WHERE id = :id', $params);
    }

    public function getCategories($id){
        $params = [
            'sort_id' => $id,
        ];
        return $this->db->row('SELECT * FROM categories WHERE sort_id = :sort_id', $params);
    }


    public function getComments($sortId){
        $params = [
            'sort_id' => $sortId,
        ];
        return $this->db->row('SELECT * FROM sort_comments WHERE sort_id = :sort_id ORDER BY time DESC', $params);
    }


}
