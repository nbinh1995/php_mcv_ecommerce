<?php
include 'core/autoload.php';
class controller_AdminController
{
    public function dashboard()
    {
        $userDAO = new model_UserDAO(model_DbConnection::make());
        $user = new model_User(trim($_POST['email']), trim($_POST['password']));
        $result = $userDAO->adminLogin($user);
        if ($result) {
            return view('admin/dashboard/dashboard');
        } else {
            $err = 'Account is undefine';
            return view('layout/404', ['err' => $err]);
        }
    }

    public function adminLogin()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            return view('admin/dashboard/dashboard');
        } else {
            return view('admin/login/login');
        }
    }
    public function adminLogout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = array();
        session_destroy();
        return redirect('dashboard');
    }
    public function categories()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
            $categoriesDetail = $categoriesDetailDAO->readCRUD();
            unset($categoriesDetailDAO);
            return view('admin/manager/managerCategories', ['categoriesDetail' => $categoriesDetail]);
        } else {
            return view('admin/login/login');
        }
    }
    public function product()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $productDAO = new model_ProductDAO(model_DbConnection::make());
            $product = $productDAO->readCRUD();
            unset($productDAO);
            $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
            $imgProduct = [];
            foreach($product as $img){
                $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
            }
            unset($imgProductDAO);
            $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
            $categoriesDetail = $categoriesDetailDAO->readCRUD();
            unset($categoriesDetailDAO);
            $data = ['product' => $product, 'imgProduct' => $imgProduct,'categoriesDetail'=> $categoriesDetail];
            return view('admin/manager/managerProduct', $data);
        } else {
            return view('admin/login/login');
        }
    }
    public function user()
    {    $err = [
        'stmt' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'name' => '',
        'address' => '',
        'phone' => ''
        ];
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readCRUD();
            $userAd = $userDAO->readAdCRUD();
            unset($userDAO);
            $data = ['user'=>$user,'userAd'=>$userAd,'err'=>$err];
            return view('admin/manager/managerUser',$data);
        } else {
            return view('admin/login/login');
        }
    }
    public function order()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            return view('admin/manager/managerOrder');
        } else {
            return view('admin/login/login');
        }
    }
}
