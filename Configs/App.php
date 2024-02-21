<?php
$app['Login'] = [
    'default_controller',
    'nguoi-dung/them-nguoi-dung',
    'nguoi-dung',
    'User/add',
    'Tai-khoan/register',
    'Nguoi-dung/sua/(:num)',
    'Nguoi-dung/xoa/(:num)',
    'home',
    'User/add',
    'User/index',
    'User/add',
    'Auth/register',
    'User/edit',
    'User/delete'
];
define('_APP', $app);
