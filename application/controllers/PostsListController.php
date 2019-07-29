<?php

namespace application\controllers;

use application\core\Controller;

class PostsListController extends Controller

{
    private $posts;
    private $categories;

    public function postsListAllAction()
    {
        $this->posts = $this->model->getPostsList();
        $this->categories = $this->model->getCategoriesList();
        $this->setData();
        $this-> view-> render('Статьи о садовых цветах', [
            'posts' => $this->posts,
            'categories' => $this->categories
        ]);
    }

   public function postsListCategoryAction(){
       $cat_id = $this->getIdFromUrl();
       $cat_name = $this->model->getCategoryName($cat_id);
       $this->posts = $this->model->getPostsListCategory($cat_id);
       $this->categories = $this->model->getCategoriesList();
       $this->setData();
       $this-> view-> render('Статьи о садовых цветах - ' . $cat_name, [
           'posts' => $this->posts,
           'categories' => $this->categories,
           'cat_id' => $cat_id
       ]);
   }

   private function setData(){
       foreach ($this->posts as &$item) {
           $item['imgSrc'] = $this->getImgPostPath($item['id']);
           $item['post_category_name'] = $this->model->getCategoryName($item['category']);
           $item['like_status'] = $this->model->getLikeStatus($item['id']);
           $item['date_comment'] = date( 'd.m.Y',$item['time']);
       }
   }

}
