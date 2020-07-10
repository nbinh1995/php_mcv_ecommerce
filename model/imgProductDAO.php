<?php
class model_imgProductDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function readCRUD(){
        $sql = "Select * from `img_product`";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS); 
    }
    public function readIdCRUD($id){
        $sql = "Select * from `img_product` where `product_id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function createCRUD(model_imgProduct $imgProduct){
        $sql = "INSERT INTO `img_product` (`product_id`,`img`) VALUES (?,?)";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$imgProduct->product_id);
         $statement->bindParam(2,$imgProduct->img);
         return $statement->execute();

    }

    public function updateCRUD(model_imgProduct $imgProduct){
        $sql = "UPDATE `img_product`
        SET `product_id` = ?,`img` = ?
        WHERE `id` = ?";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$imgProduct->product_id);
         $statement->bindParam(2,$imgProduct->img);
         $statement->bindParam(3,$imgProduct->id);
         
         return $statement->execute();

    }

    public function deleteCRUD($id){
        $sql = "DELETE FROM `img_product` WHERE `id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute();
    }
    public function deleteProCRUD($id){
        $sql = "DELETE FROM `img_product` WHERE `product_id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute();
    }
}
?>