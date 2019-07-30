<?php

namespace application\controllers;

use application\core\Controller;

use application\lib\Pagination;

class PostsListController extends Controller

{
    private $posts;
    private $categories;

    private function getPage(){
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    public function postsListAllAction()
    {
        $this->categories = $this->model->getCategoriesList();
        $total = $this->model->getTotal('SELECT COUNT(*) as count FROM posts', []);
        $perpage = 10;
        $pagination = new Pagination($this->getPage(),$perpage, $total);
        $this->posts = $this->model->getPostsList('LIMIT ' . ($pagination->getStart()) .',' .$perpage);
        $this->setData();
        $this-> view-> render('Статьи о садовых цветах', [
            'posts' => $this->posts,
            'categories' => $this->categories,
            'pagination' => $pagination->getHtml()
        ]);
    }

   public function postsListCategoryAction(){
       $cat_id = $this->getIdFromUrl();
       $cat_name = $this->model->getCategoryName($cat_id);
       $total = $this->model->getTotal('SELECT COUNT(*) as count FROM posts WHERE category = :category', ['category' => $cat_id]);
       $perpage = 10;
       $pagination = new Pagination($this->getPage(),$perpage, $total);
       $this->posts = $this->model->getPostsListCategory($cat_id, 'LIMIT ' . ($pagination->getStart()) .',' .$perpage);
       $this->categories = $this->model->getCategoriesList();
       $this->setData();
       $this-> view-> render('Статьи о садовых цветах - ' . $cat_name, [
           'posts' => $this->posts,
           'categories' => $this->categories,
           'cat_id' => $cat_id,
           'pagination' => $pagination->getHtml()
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
