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
            'category' => trim($post['category']),
            'time' => time(),
            'count_like' => 0
        ];
        $this->db->query('INSERT INTO posts VALUES (:id, :title, :text, :category, :time, :count_like)', $params);

        $status = ['id' => $this->db->lastInsertId(), 'status' => 'success'];

        $params_cat = [
            'id' => (int)$params['category']
        ];

        $count_post = $this->db->row('SELECT count_post FROM post_categories WHERE id = :id', $params_cat);
        $params_cat['count_post'] = $count_post[0]['count_post'] + 1;
        $this->db->query('UPDATE post_categories SET count_post = :count_post WHERE id = :id', $params_cat);

        return $status;
    }

    public function getPostsList()
    {
        return $this->db->row('SELECT * FROM posts ORDER BY time DESC');
    }

    public function getPostsListCategory($cat_id){
        $params = [
            'category' => $cat_id,
        ];
        return $this->db->row('SELECT * FROM posts WHERE category = :category', $params);
    }

    public function getFourPosts()
    {
        return $this->db->row('SELECT id, title FROM posts ORDER BY time DESC LIMIT 4');
    }

    public function getCategoriesList(){
        return $this->db->row('SELECT * FROM post_categories WHERE count_post != 0 ORDER BY count_post DESC');
    }

    public function deletePost($id)
    {
        $params = [
            'id' => $id,
        ];

        $category = $this->db->row('SELECT category FROM posts  WHERE id = :id WHERE count_post IS NOT NULL', $params);

        $cat_id = sizeof($category) ? $category[0]['category'] : 0;


        $this->db->query('DELETE FROM posts WHERE id = :id', $params);
        $this->db->query('DELETE FROM post_comments WHERE post_id = :id', $params);
        $this->db->query('DELETE FROM post_likes WHERE post_id = :id', $params);

        $params_cat = [
            'id' => $cat_id
        ];

        $count_post = $this->db->row('SELECT count_post FROM post_categories WHERE id = :id', $params_cat);
        $params_cat['count_post'] = $count_post[0]['count_post'] - 1;
        $this->db->query('UPDATE post_categories SET count_post = :count_post WHERE id = :id', $params_cat);


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
            'category' => trim($post['category']),
        ];
        $this->db->query('UPDATE posts SET title = :title, text = :text, category = :category WHERE id = :id', $params);
        return ['message' => 'Статья отредактирована', 'status' => 'success'];
    }

    public function getComments($postId){
        $params = [
            'post_id' => $postId,
        ];
        return $this->db->row('SELECT * FROM post_comments WHERE post_id = :post_id ORDER BY time DESC', $params);
    }

    public function getLikeStatus($id){

        $user_id = $_SESSION ? $_SESSION['id'] : 0;

        $params = [
            'user_id' => $user_id,
            'post_id' => $id
        ];
        $like = $this->db->row('SELECT * FROM posts_likes WHERE user_id = :user_id AND post_id = :post_id', $params);
        return sizeof($like) ?  true : false;
    }

    public function getCategories(){
        return $this->db->row('SELECT * FROM post_categories');
    }

    public function getCategoryName($id){
        $params = [
            'id' => $id
        ];

        $category = $this->db->row('SELECT name FROM post_categories WHERE id = :id', $params);

        return sizeof($category) ? $category[0]['name'] : null;
    }

}
