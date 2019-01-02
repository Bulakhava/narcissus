<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
        'folderCtrl' => '',
        'model' => null
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
    'catalog/{id:\d+}' => [
        'controller' => 'catalog',
        'action' => 'catalog',
        'folderCtrl' => '',
        'model' => 'Sort'
    ],
];