<?php

namespace application\models;

use application\core\Model;

class Post extends Model
{

    public function postAdd($post)
    {
        $params = [
            'id' => 0,
            'title' => trim($post['title']),
            'text' => trim($post['text']),
            'time' => time()
        ];

        $this->db->query('INSERT INTO posts VALUES (:id, :title, :text, :time)', $params);
        return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

    }

    public function getPostsList()
    {
        return $this->db->row('SELECT id, title FROM posts ORDER BY title');
    }

    public function deletePost($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM posts WHERE id = :id', $params);
        $this->rmRec('img/posts/' . $id);
    }

    public function getPost($id){
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM posts WHERE id = :id', $params);
    }

    public function editPost($post, $id){
        $params = [
            'id' => $id,
            'title' => trim($post['title']),
            'text' => trim($post['text']),
        ];
        $this->db->query('UPDATE posts SET title = :title, text = :text WHERE id = :id', $params);
        return ['message' => 'Статья отредактирована', 'status' => 'success'];
    }


}
