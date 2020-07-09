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
            $imgProduct = $imgProductDAO->readCRUD();
            $data = ['product' => $product, 'imgProduct' => $imgProduct];
            unset($imgProductDAO);
            return view('admin/manager/managerProduct', $data);
        } else {
            return view('admin/login/login');
        }
    }
    public function user()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            return view('admin/manager/managerUser');
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
