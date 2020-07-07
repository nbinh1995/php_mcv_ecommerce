<?php
class model_CategoriesDetailDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function readCRUD(){
        $sql = "Select * from categories_detail";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function readIdCRUD($id){
        $sql = "Select * from categories_detail where `categories_id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCRUD(model_CategoriesDetail $categories_detail)
    {
        $sql = "INSERT INTO `categories_detail` (`categories_id`,`item_name`) VALUES (?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$categories_detail->categories_id);
        $statement->bindParam(2,$categories_detail->item_name);
        
        return $statement->execute();
    }
    public function updateCRUD(model_CategoriesDetail $categories_detail){
        $sql = "UPDATE `categories_detail` 
                SET `categories_id` = ?,`item_name` = ? 
                WHERE `id` = ?";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$categories_detail->categories_id);
         $statement->bindParam(2,$categories_detail->item_name);
         $statement->bindParam(3,$categories_detail->id);
         
         return $statement->execute();

    }
    public function deleteCRUD($id){
        $sql = "DELETE FROM `categories_detail` WHERE `id`= ?;";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$id);
         return $statement->execute();
    }
    
}
?>