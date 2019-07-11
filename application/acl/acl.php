<?php

return [
    'authorized'=>['index','logout', 'catalog', 'getGalleryImg', 'gallery', 'addSortComment'],
    'guest'=>['index', 'registration', 'confirm', 'login', 'catalog', 'getGalleryImg', 'gallery'],
    'admin'=>[
        'index',
        'registration',
        'confirm',
        'login',
        'logout',
        'flowersList',
        'addSort',
        'deleteSort',
        'catalog',
        'editSort',
        'changeImg',
        'addGalleryImg',
        'removeGalleryImg',
        'addCategory',
        'deleteCategory',
        'addImgCategory',
        'getGalleryImg',
        'gallery',
        'addSortComment',
        'deleteSortComment',
        'addPost',
        'postsList',
        'deletePost',
        'editPost',
        'changePostImg'
    ]
];
