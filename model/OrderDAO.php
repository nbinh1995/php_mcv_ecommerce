<?php
class model_OrderDetailDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function readCRUD(){
        $sql = "Select * from `order` where `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function readIdCRUD($id){
        $sql = "Select * from `order` where `id` = ? and `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCRUD(model_Order $order)
    {
        $sql = "INSERT INTO `order` 
                (`user_id`,`name`,`address`,`phone`,`total_order`) 
                VALUES (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$order->user_id);
        $statement->bindParam(2,$order->name);
        $statement->bindParam(3,$order->address);
        $statement->bindParam(4,$order->phone);
        $statement->bindParam(5,$order->total_order);
        return $statement->execute();
    }

    public function updateCRUD(model_Order $order){
        $sql = "UPDATE `order`
        SET
        `user_id` = ?,
        `name` = ?,
        `address` = ?,
        `phone` = ?,
        `total_order` = ?
        WHERE `id` = ? and `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$order->user_id);
        $statement->bindParam(2,$order->name);
        $statement->bindParam(3,$order->address);
        $statement->bindParam(4,$order->phone);
        $statement->bindParam(5,$order->total_order);
        $statement->bindParam(6,$order->id);
        return $statement->execute();
    }

    public function updateStatus($status,$id){
        $sql = "UPDATE `order` 
                SET `status` = ? 
                WHERE `id` = ? and `id_delete` = 0";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$status);
         $statement->bindParam(2,$id);
         return $statement->execute();
    }

    public function deleteCRUD($id){
        $sql = "UPDATE `order` 
                SET `id_delete` = 1 
                WHERE `id` = ?";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$id);
         return $statement->execute();
    }
}
?>