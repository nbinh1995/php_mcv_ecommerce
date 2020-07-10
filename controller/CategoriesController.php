<?php
include 'core/autoload.php';
class controller_CategoriesController{
    public function add(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["adLoggedin"]) && $_SESSION["adLoggedin"] === true) {
            $categoriesDetailDAO = new model_CategoriesDetailDAO(model_DbConnection::make());
            $categoriesDetail = new model_CategoriesDetail(trim($_POST['categories_id']),trim($_POST['item_name']));
            $categoriesDetailDAO->createCRUD($categoriesDetail);
            return redirect('adCategories'); 
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
            $categoriesDetail->id=trim($_POST['id']);
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