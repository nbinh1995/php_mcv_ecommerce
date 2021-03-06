<?php
/*control site*/ 
$router->get('', 'controller_SiteController@home');
$router->get('home', 'controller_SiteController@home');
$router->get('login', 'controller_SiteController@login');
$router->get('register', 'controller_SiteController@register');
$router->get('account', 'controller_SiteController@account');
$router->get('shop', 'controller_SiteController@shop');
$router->get('shopSearch', 'controller_SiteController@shopSearch');
$router->get('single', 'controller_SiteController@single');
$router->get('checkout', 'controller_SiteController@checkout');
// control Users
$router->get('logout','controller_UserController@logout');
$router->post('login','controller_UserController@login');
$router->post('account','controller_UserController@changePass');
$router->post('register','controller_UserController@register');
/* control CRUD User*/
$router->post('addUser','controller_UserController@add');
$router->post('editUser','controller_UserController@edit');
$router->get('deleteUser','controller_UserController@delete');
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
/* control CRUD Product*/
$router->post('addPro','controller_ProductController@add');
$router->post('editPro','controller_ProductController@edit');
$router->get('deletePro','controller_ProductController@delete');
$router->post('addImgPro','controller_ProductController@addImg');
$router->get('deleteImgPro','controller_ProductController@deleteImg');
/* control cart*/
$router->post('addCart','controller_CartController@add');
$router->get('clearCart','controller_CartController@clear');
$router->get('removeCart','controller_CartController@remove');
$router->post('orderCart','controller_CartController@order');
$router->post('editStatus','controller_CartController@edit')
?>