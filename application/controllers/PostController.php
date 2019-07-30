<?php

namespace application\controllers;

use application\core\Controller;

use application\core\View;

class PostController extends Controller
{
    public function postAction()
    {
        $id = $this->getIdFromUrl();
        $post = $this->model->getPost($id)[0];
        $post['like_status'] = $this->model->getLikeStatus($id);

        if(!sizeof($post)){
            View::errorCode(404);
        }
        $comments = $this->model->getComments($id);
        foreach ($comments as &$value) {
            $value['date_comment'] = date( 'd.m.Y',$value['time']);
        }
        $all_posts = $this->model->getFourPosts();
        $cat_posts = array_filter($all_posts, function ($val) use ($id) {
            return $val['id'] != $id;
        });
        $last_posts = array_slice($cat_posts, 0, 4);

        foreach ($last_posts as &$item) {
            $item['imgSrc'] = $this->getImgPostPath($item['id']);
        }

        $this-> view-> render($post['title'], [
               'page' => 'post',
               'post' => $post,
               'post_category_name' => $this->model->getCategoryName($post['category']),
               'imgPath' => $this->getImgPostPath($id),
               'id' => $id,
               'post_date' =>  date( 'd.m.Y', $post['time']),
               'comments' => $comments,
               'last_posts' => $last_posts
        ]);
    }

}
