<?php
class model_ProductDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function readCRUD(){
        $sql = "Select * from `product`";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function readIdCRUD($id){
        $sql = "Select * from `product` where `categories_detail_id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readHotCRUD(){
        $sql = "Select * from `product` where `isHot` = 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function readNewCRUD(){
        $sql = "Select * from `product` where `isNew` = 1";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createCRUD(model_Product $product)
    {
        $sql = "INSERT INTO `product` 
        (`categories_detail_id`,`name`,`content`,`price`,`discount`,`isNew`,`isHot`)
        VALUES (?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$product->categories_detail_id);
        $statement->bindParam(2,$product->name);
        $statement->bindParam(3,$product->content);
        $statement->bindParam(4,$product->price);
        $statement->bindParam(5,$product->discount);
        $statement->bindParam(6,$product->isNew);
        $statement->bindParam(7,$product->isHot);
        return $statement->execute();
    }
    public function updateCRUD(model_Product $product){
        $sql = "UPDATE `product`
                SET
        `categories_detail_id` = ?,
        `name` = ?,
        `content` = ?,
        `price` = ?,
        `discount` = ?,
        `isNew` = ?,
        `isHot` = ?
        WHERE `id` = ?";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$product->categories_detail_id);
         $statement->bindParam(2,$product->name);
         $statement->bindParam(3,$product->content);
         $statement->bindParam(4,$product->price);
         $statement->bindParam(5,$product->discount);
         $statement->bindParam(6,$product->isNew);
         $statement->bindParam(7,$product->isHot);
         $statement->bindParam(8,$product->id);
         return $statement->execute();
    }
    public function deleteCRUD($id){
        $sql = "DELETE FROM `product` WHERE `id`= ?;";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$id);
         return $statement->execute();
    }
}
?>