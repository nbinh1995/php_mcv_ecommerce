<?php
/*control site*/ 
$router->get('', 'controller_SiteController@home');
$router->get('home', 'controller_SiteController@home');
$router->get('login', 'controller_SiteController@login');
$router->get('register', 'controller_SiteController@register');
$router->get('account', 'controller_SiteController@account');
$router->get('shop', 'controller_SiteController@shop');
$router->get('single', 'controller_SiteController@single');
$router->get('checkout', 'controller_SiteController@checkout');
// control Users
$router->get('logout','controller_UserController@logout');
$router->post('login','controller_UserController@login');
$router->post('account','controller_UserController@changePass');
$router->post('register','controller_UserController@register');
/* control admin*/
$router->get('dashboard', 'controller_AdminController@adminLogin');
$router->post('dashboard', 'controller_AdminController@dashboard');
$router->get('adminLogout','controller_AdminController@adminLogout');
$router->get('adCategories','controller_AdminController@categories');
$router->get('adProduct','controller_AdminController@product');
$router->get('adUser','controller_AdminController@user');
$router->get('adOrder','controller_AdminController@order');
/* control CRUD Categories*/
$router->post('addCat','controller_CategoriesController@add');
$router->post('editCat','controller_CategoriesController@edit');
$router->get('deleteCat','controller_CategoriesController@delete');
?>