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
// control register
$router->get('logout','controller_UserController@logout');
$router->post('login','controller_UserController@login');
$router->post('account','controller_UserController@changePass');
$router->post('register','controller_UserController@register');
/* control admin*/
$router->get('dashboard', 'controller_AdminController@adminLogin');
$router->post('admin', 'controller_AdminController@dashboard');

?>