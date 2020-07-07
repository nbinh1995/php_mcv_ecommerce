<?php
include 'core/autoload.php';
class controller_UserController
{
   public function menu()
   {
      //menu
      $categoriesDAO = new model_CategoriesDAO(model_DbConnection::make());
      $categories =  $categoriesDAO->readCRUD();
      unset($categoriesDAO);
      $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
      $categoriesDetail = [];
      foreach ($categories as $menu) {
         $categoriesDetail[] = $categoriesDetailDAO->readIdCRUD($menu->id);
      }
      unset($categories_detailDAO);
      $aboutDAO = new model_AboutDAO(model_DbConnection::make());
      $about= $aboutDAO->readCRUD();
      unset($aboutDAO);
        return ['categories'=>$categories,
                'categoriesDetail'=>$categoriesDetail,
                'about' => $about];
   }

   function register()
   {
      $data = $this->menu();
      $userDAO = new model_UserDAO(model_DbConnection::make());
      $email_reg = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
      $pass_reg = '/^[a-zA-Z0-9]{6,}$/';
      $phone_reg = '/^0[0-9]{9,10}$/';
      $err = [
         'stmt' => '',
         'email' => '',
         'password' => '',
         'confirm_password' => '',
         'name' => '',
         'address' => '',
         'phone' => ''
      ];
      // Validate email
      if (empty(trim($_POST["email"]))) {
         $err['email'] = "Nhập Email của bạn vào.";
      } else {
         $email = trim($_POST["email"]);
         if (preg_match_all($email_reg, $email)) {
            switch ($userDAO->existEmail($email)) {
               case 0:
                  $err['email'] = 'Email này đã được sử dụng.';
                  break;
               case -1:
                  $err['stmt'] = 'Có lỗi xãy ra. Bạn hãy thực hiện đăng kí lại.';
                  break;
            }
         } else $err['email'] = "Đây không phải là một Email.";
      }

      // Validate password
      if (empty(trim($_POST["password"]))) {
         $err['password'] = "Nhập password của bạn vào.";
      } elseif (preg_match_all($pass_reg, trim($_POST["password"]))) {
         $password = trim($_POST["password"]);
      } else {
         $err['password'] = "Password phải có ít nhất 6 kí tự và ko có kí tự đặt biệt nào.";
      }

      // Validate confirm password
      if (empty(trim($_POST["confirm_password"]))) {
         $err['confirm_password'] = "Nhập password của bạn vào.";
      } else {
         $confirm_password = trim($_POST["confirm_password"]);
         if (empty($err['password']) && ($password != $confirm_password)) {
            $err['confirm_password'] = "Password không giống nhau.";
         }
      }

      // Validate name
      if (empty(trim($_POST["name"]))) {
         $err['name'] = "Nhập tên của bạn vào.";
      }

      // Validate address
      if (empty(trim($_POST["address"]))) {
         $err['address'] = "Nhập địa chỉ của bạn vào.";
      }

      // Validate phone
      if (empty(trim($_POST["phone"]))) {
         $err['phone'] = "Nhập số điện thoại của bạn vào.";
      } else {
         $phone = trim($_POST["phone"]);
         if (!preg_match($phone_reg, $phone)) {
            $err['phone'] = 'Không phải số điện thoại';
         }
      }

      if (
         empty($err['stmt']) && empty($err['email']) && empty($err['password']) &&
         empty($err['confirm_password']) && empty($err['name'] && empty($err['address'])) && empty($err['phone'])
      ) {
         $user = new model_User(
            trim($_POST['email']),
            trim($_POST['password']),
            trim($_POST["name"]),
            trim($_POST['address']),
            trim($_POST['phone'])
         );

         if ($userDAO->register($user)) {
            $data['err'] = $err;
            if (!isset($_SESSION)) {
               session_start();
            }
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
               $this->logout();
               exit();
            }
            return redirect('login');
         } else {
            $err['stmt'] = 'Có lỗi xãy ra. Bạn hãy thực hiện đăng kí lại.';
            $data['err'] = $err;
            return view('site/user/register', $data);
         }
      } else {
         $data['err'] = $err;
         return view('site/user/register', $data);
      }
   }

   public function login()
   {
      $data = $this->menu();
      $email_reg = '/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/';
      $pass_reg = '/^[a-zA-Z0-9]{6,}$/';

      $userDAO = new model_UserDAO(model_DbConnection::make());
      $user = new model_User();
      // Define variables and initialize with empty values
      $err = [
         'stmt' => '',
         'email' => '',
         'password' => ''
      ];

      // Validate email
      if (empty(trim($_POST["email"]))) {
         $err['email'] = "Nhập Email của bạn vào.";
      } else {
         if (preg_match_all($email_reg, trim($_POST["email"]))) {
            $user->email = trim($_POST["email"]);
         } else $err['email'] = "Đây không phải là một Email.";
      }

      // Validate password
      if (empty(trim($_POST["password"]))) {
         $err['password'] = "Nhập password của bạn vào.";
      } elseif (preg_match_all($pass_reg, trim($_POST["password"]))) {
         $user->password = trim($_POST["password"]);
      } else {
         $err['password'] = "Password phải có ít nhất 6 kí tự và ko có ký tự đặt biệt nào.";
      }
      // Validate credentials
      if (empty($err['email']) && empty($err['password'])) {
         switch ($userDAO->login($user)) {
            case 1:
               return redirect('home');
               break;
            case 0:
               $err['password'] = 'Password không đúng!';
               $data['err'] = $err;
               return view('site/user/login', $data);
               break;
            case -1:
               $err['email'] = 'email không tồn tại!';
               $data['err'] = $err;
               return view('site/user/login', $data);
               break;
            case -2:
               $err['stmt'] = 'Có lỗi xãy ra. Bạn hãy thực hiện đăng nhập lại.';
               $data['err'] = $err;
               return view('site/user/login', $data);
               break;
         };
      }
   }

   public function changePass()
   {
      $data = $this->menu();
      $pass_reg = '/^[a-zA-Z0-9]{6,}$/';
      $userDAO = new model_UserDAO(model_DbConnection::make());
      $user = new model_User();
      if (empty(trim($_POST["old_pass"]))) {
         $err['new_pass'] = "Nhập password của bạn vào.";
      } elseif (preg_match_all($pass_reg, trim($_POST["old_pass"]))) {
         $old_pass = trim($_POST['old_pass']);
      } else {
         $err['old_pass'] = "Password phải có ít nhất 6 kí tự và ko có ký tự đặt biệt nào.";
      }

      // Validate password
      if (empty(trim($_POST["new_pass"]))) {
         $err['new_pass'] = "Nhập password của bạn vào.";
      } elseif (preg_match_all($pass_reg, trim($_POST["new_pass"]))) {
         $new_pass = trim($_POST['new_pass']);
      } else {
         $err['new_pass'] = "Password phải có ít nhất 6 kí tự và ko có ký tự đặt biệt nào.";
      }

      if (!isset($_SESSION)) {
         session_start();
      }
      if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
         $user = $userDAO->readCRUD($_SESSION["id"]);
         var_dump($user);
         if (empty($err['email']) && empty($err['password'])) {
            if ($user->password === md5($old_pass)) {
               $user->password = $new_pass;
               var_dump($user);
               if ($userDAO->changePass($user)) {
                  $this->logout();
                  exit();
               } else {
                  $err['stmt'] = 'Có lỗi xãy ra. Bạn hãy thực hiện đổi mật khẩu lại lại.';
               }
            } else $err['old_pass'] = 'Mật khẩu cũ không đúng';
         }
         $data['user'] = $user;
         $data['err'] = $err;
         return view('site/user/myaccount', $data);
      }
   }

   public function logout()
   {
      // $data = $this->menu();
      if (!isset($_SESSION)) {
         session_start();
      }
      $_SESSION = array();
      session_destroy();
      return redirect('login');
   }
}
