<?php
include 'core/autoload.php';
class controller_AdminController
{
    public function dashboard()
    {
        $userDAO = new model_UserDAO(model_DbConnection::make());
        $user = new model_User(trim($_POST['email']),trim($_POST['password']));
        $result = $userDAO->adminLogin($user);
        if ($result) {
            return view('admin/dashboard/dashboard');
        } else {
            echo 'Sai thông tin tài khoản';
        }
    }

    public function adminLogin()
    {
        return view('admin/login/login');
    }
}
