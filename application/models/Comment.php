<?php

namespace application\models;

use application\core\Model;

class Comment extends Model
{
    public function commentAdd($params) {

        $comment = [
             'id' => 0,
             'text' => trim($params['text']),
             'user_id' => $params['userId'],
             'sort_id' => $params['sortId'],
             'user_full_name' =>  $this -> getFullUserName($params['userId']),
              'time' => time(),
        ];

        $this->db->query('INSERT INTO sort_comments VALUES (:id, :text, :user_id, :sort_id, :user_full_name, :time)', $comment);
        return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

    }

    public function postCommentAdd($params) {
        $comment = [
            'id' => 0,
            'text' => trim($params['text']),
            'user_id' => $params['userId'],
            'post_id' => $params['postId'],
            'user_full_name' =>  $this -> getFullUserName($params['userId']),
            'time' => time(),
        ];


        $this->db->query('INSERT INTO post_comments VALUES (:id, :text, :user_id, :post_id, :user_full_name, :time)', $comment);
        return ['id' => $this->db->lastInsertId(), 'status' => 'success'];

    }

    private function getFullUserName($userId){
        $params = [
            'id' => $userId,
        ];
        $user = $this->db->row('SELECT * FROM accounts WHERE id = :id', $params)[0];
        return ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name']);
    }

    public function deleteSortComment($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM sort_comments WHERE id = :id', $params);
    }

    public function deletePostComment($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM post_comments WHERE id = :id', $params);
    }

}
