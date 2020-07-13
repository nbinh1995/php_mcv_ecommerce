<?php
include 'core/autoload.php';
class controller_SiteController
{
    public function menu()
    {
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
        $about = $aboutDAO->readCRUD();
        unset($aboutDAO);
        if(isset($_COOKIE["shopping_cart"]))
			{
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
            }else
            {
                $cart_data = array();
            }
            $count =0;
            foreach($cart_data as $item){
                $count += $item['product_amount'];
            }
        return [
            'categories' => $categories,
            'categoriesDetail' => $categoriesDetail,
            'about' => $about,
            'count' => $count
        ];
    }
    public function home()
    {
        $data = $this->menu();
        //baner
        $bannerDAO = new model_BannerDAO(model_DbConnection::make());
        $banner = $bannerDAO->readCRUD();
        $data['banner'] = $banner;
        unset($bannerDAO);
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        $productDAO = new model_ProductDAO(model_DbConnection::make());
        $productNew = $productDAO->readNewCRUD();
        $data['productNew'] = $productNew;

        $productHot = $productDAO->readHotCRUD();
        $data['productHot'] = $productHot;
        unset($productDAO);
        
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        $imgProductNew = [];
        foreach ($productNew as $img) {
            $imgProductNew[] = $imgProductDAO->readIdCRUD($img->id);
        }
        $data['imgProductNew'] = $imgProductNew;

        $imgProductHot = [];
        foreach ($productHot as $img) {
            $imgProductHot[] = $imgProductDAO->readIdCRUD($img->id);
        }
        $data['imgProductHot'] = $imgProductHot;
        unset($imgProductDAO);
        return view('site/home/home', $data);
    }

    public function login()
    {
        $data = $this->menu();
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
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
        $data['err'] = $err;
        return view('site/user/login', $data);
    }
    public function register()
    {
        $data = $this->menu();
        $err = [
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
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        $data['err'] = $err;
        return view('site/user/register', $data);
    }
    public function account()
    {
        $data = $this->menu();
        $err = [
            'stmt' => '',
            'email' => '',
            'password' => '',
            'old_pass' => '',
            'new_pass' => ''
        ];
        $data['err'] = $err;
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
            return view('site/user/myaccount', $data);
            exit();
        }
        return view('site/user/login', $data);
    }
    public function shop()
    {
        $data = $this->menu();
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            unset($userDAO);
            $data['user'] = $user;
        }
        $productDAO = new model_ProductDAO(model_DbConnection::make());
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        if(isset($_GET['cate'])){
            
            switch(trim($_GET['cate'])){
                case 'newmen':
                    $product = $productDAO->readNewMen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'newwomen':
                    $product = $productDAO->readNewWomen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'newkid':
                    $product = $productDAO->readNewKid();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'hotmen':
                    $product = $productDAO->readHotMen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'hotwomen':
                    $product = $productDAO->readHotWomen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'hotkid':
                    $product = $productDAO->readHotKid();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'new':
                    $product = $productDAO->readNewCRUD();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'hot':
                    $product = $productDAO->readHotCRUD();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'men':
                    $product = $productDAO->readMen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'women':
                    $product = $productDAO->readWomen();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                case 'kid':
                    $product = $productDAO->readKid();
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
                break;
                default:
                    $product = $productDAO->readIdCRUD(trim($_GET['cate']));
                    $data['product'] = $product;
                    $imgProduct = [];
                    foreach ($product as $img) {
                        $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
                    }
                    $data['imgProduct'] = $imgProduct;
            }
        }else{       
        $product = $productDAO->readCRUD();
        $data['product'] = $product;
        $imgProduct = [];
        foreach ($product as $img) {
            $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
        }
        $data['imgProduct'] = $imgProduct;
        }
        unset($productDAO);
        unset($imgProductDAO);
        return view('site/shop/shop', $data);
    }
   

    public function shopSearch(){
        $data = $this->menu();
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            unset($userDAO);
            $data['user'] = $user;
        }
        $productDAO = new model_ProductDAO(model_DbConnection::make());
        $product = $productDAO->readsearch(trim($_GET['search']));
        $data['product'] = $product;
        unset($productDAO);
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        $imgProduct = [];
        foreach ($product as $img) {
            $imgProduct[] = $imgProductDAO->readIdCRUD($img->id);
        }
        $data['imgProduct'] = $imgProduct;
        return view('site/shop/shop', $data);
    }
    public function single()
    {
        $data = $this->menu();
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        $productDAO = new model_ProductDAO(model_DbConnection::make());
        $product = $productDAO->readSingleCRUD(trim($_GET['id']));
        unset($productDAO);
        $data['product']=$product;
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        $imgProduct = $imgProductDAO->readIdCRUD(trim($_GET['id']));
        $data['imProduct'] = $imgProduct;
        return view('site/shop/single', $data);
    }
    public function checkout()
    {   
        $data = $this->menu();
        if (!isset($_SESSION)) {
            session_start();
        }
        // Check already loged in
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $userDAO = new model_UserDAO(model_DbConnection::make());
            $user = $userDAO->readIdCRUD($_SESSION["id"]);
            $data['user'] = $user;
        }
        if(isset($_COOKIE["shopping_cart"]))
			{
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
                $cart_data = json_decode($cookie_data, true);
            }else
            {
                $cart_data = array();
            }
            $data['cart'] = $cart_data;
        return view('site/shop/checkout', $data);
    }
}
