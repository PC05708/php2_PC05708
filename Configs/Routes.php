<?php
$routes['default_controller'] = 'home';
$routes['nguoi-dung/them-nguoi-dung'] = 'User/add';
$routes['nguoi-dung'] = 'User/index';
$routes['User/add'] = 'User/add';
$routes['Tai-khoan/login'] = 'Auth/login';
$routes['Tai-khoan/register'] = 'Auth/register';
$routes['Nguoi-dung/sua/(:num)'] = 'User/edit/$1';
$routes['Nguoi-dung/xoa/(:num)'] = 'User/delete/$1';
