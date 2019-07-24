<?php

namespace application\models;

use application\core\Model;

class Like extends Model
{
    public function postLikeAdd ($params){

        $like = [
            'id' => 0,
            'user_id' => $params['user_id'],
            'post_id' => $params['post_id']
        ];

           $like_id = $this->db->row('SELECT id FROM posts_likes WHERE user_id = :user_id AND post_id = :post_id', $params);

          return sizeof($like_id) ?  $this->likeRemove($like_id[0]['id'], $params['post_id']) : $this->likeAdd($like);
    }

    private function likeAdd($like){
            $this->db->query('INSERT INTO posts_likes VALUES (:id, :user_id, :post_id)', $like);
            $params = [
                'id' => $like['post_id']
            ];
            $count_like = $this->db->row('SELECT count_like FROM posts WHERE id = :id', $params);
            $params['count_like'] = $count_like[0]['count_like'] + 1;
            $this->db->query('UPDATE posts SET count_like = :count_like WHERE id = :id', $params);
            return ['message' => 'Лайк добавлен', 'status' => 'added'];
    }

    private function likeRemove($like_id, $post_id){
        $like_params = [
            'id' => $like_id
        ];
        $this->db->query('DELETE FROM posts_likes WHERE id = :id', $like_params);

        $post_params = [
            'id' => $post_id,
        ];

        $count_like = $this->db->row('SELECT count_like FROM posts WHERE id = :id', $post_params);
        $post_params['count_like'] = $count_like[0]['count_like'] - 1;
        $this->db->query('UPDATE posts SET count_like = :count_like WHERE id = :id', $post_params);

       return ['message' => 'Лайк удален', 'status' => 'deleted'];
    }


}
