<?php
include 'core/autoload.php';
class controller_ProductController
{
    public function uploadImage()
    {
        $target_dir = "public/images/";
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_temp = $_FILES['fileToUpload']['tmp_name'];
        $uploadOk = true;
        // Allow certain file formats
        foreach ($file_name as $img) {
            $div = explode('.', $img);
            $imageFileType[] = strtolower(end($div));
        }
        for ($i = 0; $i < count($imageFileType); $i++) {
            $unique_image[] = substr(md5(time()), 0, 10) . basename($file_temp[$i], ".tmp") . '.' . $imageFileType[$i];
            if (
                $imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg"
                && $imageFileType[$i] != "gif"
            ) {
                $uploadOk = false;
            }
        }
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            foreach ($file_temp as $temp) {
                $check = getimagesize($temp);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = true;
                } else {
                    $uploadOk = false;
                }
            }
        }
        // Check if file already exists
        foreach ($unique_image as $unique) {
            $uploadedAdd_image[] = $target_dir . $unique;
            $temp = $target_dir . $unique;
            if (file_exists($temp)) {
                $uploadOk = false;
            }
        }

        // Check file size
        foreach ($file_size as $size) {
            if ($size > 500000) {
                $uploadOk = false;
            }
        }


        // var_dump($uploadOk);
        if ($uploadOk) {
            for ($i = 0; $i < count($uploadedAdd_image); $i++) {
                if (move_uploaded_file($file_temp[$i], $uploadedAdd_image[$i])) {
                    $uploadOk = true;
                } else {
                    $uploadOk = false;
                    break;
                }
            }
            if ($uploadOk) return $uploadedAdd_image;
            else return $uploadOk;
        }
    }

     public function addImg(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
        $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
        if ($img = $this->uploadImage()) {
            foreach ($img as $item) {
                $imgProduct = new model_imgProduct(trim($_POST['product_id']), $item);
                $imgProductDAO->createCRUD($imgProduct);
            }
        }
        unset($imgProductDAO);
            return redirect('adProduct'); 
        } else {
            return view('layout/404');
        }
    }
    public function add()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $productDAO = new model_ProductDAO(model_DbConnection::make());
            $product = new model_Product(
                trim($_POST['categories_detail_id']),
                trim($_POST['name']),
                trim($_POST['content']),
                trim($_POST['price']),
                trim($_POST['discount']),
                trim($_POST['isNew']),
                trim($_POST['isHot'])
            );
            if ($product_id = $productDAO->createCRUD($product)) {
                $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
                if ($img = $this->uploadImage()) {
                    foreach ($img as $item) {
                        $imgProduct = new model_imgProduct($product_id, $item);
                        $imgProductDAO->createCRUD($imgProduct);
                    }
                }
                unset($imgProductDAO);
            }

            return redirect('adProduct');
        } else {
            return view('layout/404');
        }
    }

    public function edit()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $productDAO = new model_ProductDAO(model_DbConnection::make());
            $product = new model_Product(
                trim($_POST['categories_detail_id']),
                trim($_POST['name']),
                trim($_POST['content']),
                trim($_POST['price']),
                trim($_POST['discount']),
                trim($_POST['isNew']),
                trim($_POST['isHot'])
            );
            $product->id = trim($_POST['id']);
            $productDAO->updateCRUD($product);
            return redirect('adProduct');
        } else {
            return view('layout/404');
        }
    }

    public function deleteImg()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
            $imgProductDAO->deleteCRUD(trim($_GET['id']));
            unset($imgProductDAO);
            return redirect('adProduct');
        } else {
            return view('layout/404');
        }
    }
    public function delete()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $productDAO = new model_productDAO(model_DbConnection::make());
            $productDAO->deleteCRUD(trim($_GET['id']));
            unset($productDAO);
            $imgProductDAO = new model_imgProductDAO(model_DbConnection::make());
            $imgProductDAO->deleteProCRUD(trim($_GET['id']));
            unset($imgProductDAO);
            return redirect('adProduct');
        } else {
            return view('layout/404');
        }
    }
}
