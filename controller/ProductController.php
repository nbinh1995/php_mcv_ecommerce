<?php
include 'core/autoload.php';

class controller_ProductController{
    public function uploadAddImage(){
        $target_dir = "public/images/";
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_temp = $_FILES['fileToUpload']['tmp_name'];  
        $div = explode('.',$file_name);
        $imageFileType = strtolower(end($div));
        // var_dump($imageFileType);
        $unique_image = substr(md5(time()), 0, 10) . '.' .$imageFileType;
        $uploadedAdd_image = $target_dir.$unique_image;
        // $uploadedEdit_image  = $target_dir.$file_name;
        $uploadOk = true;
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize( $file_temp);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            $uploadOk = false;
        }
        }
        // Check if file already exists
        if (file_exists($uploadedAdd_image)) {
        $uploadOk = false;
        }
        // Check file size
        if ($file_size > 500000) {
        $uploadOk = false;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = false;
        }
        if ($uploadOk) {
            if (move_uploaded_file($file_temp, $uploadedAdd_image)) {
                return $uploadedAdd_image;
            }else $uploadOk = false;
        } 
        return $uploadOk;
    }

    public function uploadEditImage($uploadedEdit_image){
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_temp = $_FILES['fileToUpload']['tmp_name'];  
        $div = explode('.',$file_name);
        $imageFileType = strtolower(end($div));
        var_dump($imageFileType);
        $unique_image = substr(md5(time()), 0, 10) . '.' .$imageFileType;
        // $uploadedAdd_image = $target_dir.$unique_image;
        $uploadOk = true;
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize( $file_temp);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            $uploadOk = false;
        }
        }
        // Check if file already exists
        // if (file_exists($uploadedAdd_image)) {
        // $uploadOk = false;
        // }
        // Check file size
        if ($file_size > 500000) {
        $uploadOk = false;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = false;
        }
        if ($uploadOk) {
            if (move_uploaded_file($file_temp, $uploadedEdit_image)) {
                $uploadOk = true;
            }else $uploadOk = false;
        } 
        return $uploadOk;
    }

    public function addImg(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        
        if($img = $this->uploadAddImage()){
            // var_dump($img);
            // var_dump(trim($_POST['product_id']));
            $imgProduct = new model_imgProduct(trim($_POST['product_id']),$img);
            $imgProductDAO->createCRUD($imgProduct);
        }
        unset($imgProductDAO);
            return redirect('adProduct'); 
        } else {
            return view('layout/404');
        }
    }
    public function add(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $productDAO = new model_ProductDAO(model_DbConnection::make());
            var_dump($_POST);
            $product = new model_Product(trim($_POST['categories_detail_id']),trim($_POST['name']),
            trim($_POST['content']),trim($_POST['price']),trim($_POST['discount']),
            trim($_POST['isNew']),trim($_POST['isHot']));
            var_dump($product);
            $productDAO->createCRUD($product);
            unset($productDAO);
            return redirect('adProduct'); 
        } else {
            return view('layout/404');
        }
    }
    public function edit(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
            $categoriesDetail = new model_CategoriesDetail(trim($_POST['categories_id']),trim($_POST['item_name']));
            var_dump(trim($_POST['id']));
            $categoriesDetail->id=trim($_POST['id']);
            var_dump($categoriesDetail->id);
            $categoriesDetailDAO->updateCRUD($categoriesDetail);
            return redirect('adCategories'); 
        } else {
            return view('layout/404');
        }
    }
    public function delete(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
            $categoriesDetailDAO->deleteCRUD(trim($_GET['id']));
            return redirect('adCategories'); 
        } else {
            return view('layout/404');
        }
    }
}
?>