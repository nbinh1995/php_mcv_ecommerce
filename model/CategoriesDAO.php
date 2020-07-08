<?php
class model_CategoriesDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function readCRUD(){
        $sql = "Select * from categories and `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    // public function createCRUDs($categories)
    // {
    //     $sql = "INSERT INTO `categories` (`item_name`,`img`) VALUES (?,?)";
    //     $statement = $this->pdo->prepare($sql);
    //     $statement->bindParam(1,$categories->item_name);
    //     $statement->bindParam(2,$categories->img);
    //     return $statement->execute();
    // }

}?>