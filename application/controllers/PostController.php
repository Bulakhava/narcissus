<?php

namespace application\controllers;

use application\core\Controller;

use application\core\View;

class PostController extends Controller
{
    public function postAction()
    {
        $id = $this->getIdFromUrl();
        $post = $this->model->getPost($id);
        if(!sizeof($post)){
            View::errorCode(404);
        }
        $comments = $this->model->getComments($id);
        foreach ($comments as &$value) {
            $value['date_comment'] = date( 'd.m.Y',$value['time']);
        }
        $all_posts = $this->model->getPostsList();
        $cat_posts = array_filter($all_posts, function ($val) use ($id) {
            return $val['id'] != $id;
        });
        $last_posts = array_slice($cat_posts, 0, 4);

        foreach ($last_posts as &$item) {
            $item['imgSrc'] = $this->getImgPostPath($item['id']);
        }

        $this-> view-> render($post[0]['title'], [
               'page' => 'post',
               'post' => $post[0],
               'imgPath' => $this->getImgPostPath($id),
               'id' => $id,
               'post_date' =>  date( 'd.m.Y', $post[0]['time']),
               'comments' => $comments,
               'last_posts' => $last_posts
        ]);
    }

}
