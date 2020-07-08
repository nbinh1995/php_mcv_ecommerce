<?php
include 'core/autoload.php';

class controller_SiteController
{   public function menu(){
        //menu
        $categoriesDAO = new model_CategoriesDAO(model_DbConnection::make());
        $categories =  $categoriesDAO->readCRUD();
        unset($categoriesDAO);
        $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
        $categoriesDetail = [];
        foreach($categories as $menu){
            $categoriesDetail[]= $categoriesDetailDAO->readIdCRUD($menu->id);   
        }
        unset($categories_detailDAO);
        $aboutDAO = new model_AboutDAO(model_DbConnection::make());
        $about= $aboutDAO->readCRUD();
        unset($aboutDAO);
        return ['categories'=>$categories,
                'categoriesDetail'=>$categoriesDetail,
                'about' => $about];
    }
    public function home()
    {   $data = $this->menu();
        //baner
        $bannerDAO = new model_BannerDAO(model_DbConnection::make());
        $banner = $bannerDAO->readCRUD();
        $data['banner']=$banner;
        unset($bannerDAO);
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        return view('site/home/home',$data);
    }

    public function login(){
        $data = $this->menu();
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
            return view('site/home/home');
            exit;
        }
        $err = [
            'stmt' => '',
            'email' => '',
            'password' => ''
         ];
        $data['err']=$err;
        return view('site/user/login',$data);
    }
    public function register(){
        $data = $this->menu();
        $err=[
            'stmt'=>'',
            'email'=>'',
            'password'=>'',
            'confirm_password'=>'',
            'name'=>'',
            'address'=>'',
            'phone'=>''
        ];
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        $data['err'] = $err;
        return view('site/user/register',$data);
    }
    public function account(){
        $data = $this->menu();
        $err = [
            'stmt' => '',
            'email' => '',
            'password' => '',
            'old_pass' => '',
            'new_pass' => ''
        ];
        $data['err']=$err;
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
            return view('site/user/myaccount',$data);
            exit();
        }
        return view('site/user/login',$data);   
    } 
    public function shop(){
        $data = $this->menu();
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        return view('site/shop/shop',$data);
    }
    public function single(){
        $data = $this->menu();
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        return view('site/shop/single',$data);
    }
    public function checkout(){
        $data = $this->menu();
        if(!isset($_SESSION)) { session_start(); }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO =new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        return view('site/shop/checkout',$data);
    }
}
