<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
        'folderCtrl' => '',
        'model' => 'Post'
    ],
    'registration' => [
        'controller' => 'registration',
        'action' => 'registration',
        'folderCtrl' => '',
        'model' => 'Account'
    ],
    'confirm' => [
       'controller' => 'confirm',
        'action' => 'confirm',
        'folderCtrl' => '',
        'model' => 'Account'
    ],
    'login' => [
       'controller' => 'login',
        'action' => 'login',
        'folderCtrl' => '',
        'model' => 'Account'
    ],
    'logout' => [
        'controller' => 'login',
        'action' => 'logout',
        'folderCtrl' => '',
        'model' => null
    ],
    'catalog/{id:\d+}' => [
        'controller' => 'catalog',
        'action' => 'catalog',
        'folderCtrl' => '',
        'model' => 'Sort'
    ],
    'gallery' => [
        'controller' => 'gallery',
        'action' => 'gallery',
        'folderCtrl' => '',
        'model' => 'Sort'
    ],
    'catalog/get-gallery-img' => [
        'controller' => 'catalog',
        'action' => 'getGalleryImg',
        'folderCtrl' => '',
        'model' => 'Sort'
    ],
    'admin/flowers-list' => [
        'controller' => 'flowersList',
        'action' => 'flowersList',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/add-sort' => [
        'controller' => 'addSort',
        'action' => 'addSort',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/delete-sort' => [
        'controller' => 'flowersList',
        'action' => 'deleteSort',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/edit-sort/{id:\d+}' => [
        'controller' => 'editSort',
        'action' => 'editSort',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/change-img/{id:\d+}' => [
        'controller' => 'editSort',
        'action' => 'changeImg',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/add-galleryImg/{id:\d+}' => [
        'controller' => 'editSort',
        'action' => 'addGalleryImg',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],

    'admin/remove-galleryImg' => [
        'controller' => 'editSort',
        'action' => 'removeGalleryImg',
        'folderCtrl' => 'admin\\',
        'model' => 'Sort'
    ],
    'admin/edit-sort-category/{id:\d+}' => [
        'controller' => 'editSort',
        'action' => 'addCategory',
        'folderCtrl' => 'admin\\',
        'model' => 'Category'
    ],
    'admin/delete-category' => [
        'controller' => 'editSort',
        'action' => 'deleteCategory',
        'folderCtrl' => 'admin\\',
        'model' => 'Category'
    ],
    'admin/add-category-img/{id:\d+}' => [
        'controller' => 'editSort',
        'action' => 'addImgCategory',
        'folderCtrl' => 'admin\\',
        'model' => 'Category'
    ],
    'add-sort-comment/{id:\d+}' => [
        'controller' => 'comment',
        'action' => 'addSortComment',
        'folderCtrl' => '',
        'model' => 'Comment'
    ],
    'delete-sort-comment' => [
        'controller' => 'comment',
        'action' => 'deleteSortComment',
        'folderCtrl' => '',
        'model' => 'Comment'
    ],
    'admin/add-post' => [
        'controller' => 'addPost',
        'action' => 'addPost',
        'folderCtrl' => 'admin\\',
        'model' => 'Post'
    ],
    'admin/posts-list' => [
        'controller' => 'postsList',
        'action' => 'postsList',
        'folderCtrl' => 'admin\\',
        'model' => 'Post'
    ],
    'admin/delete-post' => [
        'controller' => 'postsList',
        'action' => 'deletePost',
        'folderCtrl' => 'admin\\',
        'model' => 'Post'
    ],
    'admin/edit-post/{id:\d+}' => [
        'controller' => 'editPost',
        'action' => 'editPost',
        'folderCtrl' => 'admin\\',
        'model' => 'Post'
    ],
    'admin/change-post-img/{id:\d+}' => [
        'controller' => 'editPost',
        'action' => 'changePostImg',
        'folderCtrl' => 'admin\\',
        'model' => 'Post'
    ],
    'post/{id:\d+}' => [
        'controller' => 'post',
        'action' => 'post',
        'folderCtrl' => '',
        'model' => 'Post'
    ],
    'add-post-comment/{id:\d+}' => [
        'controller' => 'comment',
        'action' => 'addPostComment',
        'folderCtrl' => '',
        'model' => 'Comment'
    ],
    'delete-post-comment' => [
        'controller' => 'comment',
        'action' => 'deletePostComment',
        'folderCtrl' => '',
        'model' => 'Comment'
    ],
    'contacts' => [
        'controller' => 'contacts',
        'action' => 'contacts',
        'folderCtrl' => '',
        'model' => null
    ],
];
