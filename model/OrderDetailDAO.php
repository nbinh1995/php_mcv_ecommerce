<?php
class model_OrderDetailDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function readCRUD($id){
        $sql = "Select * from `billdetail` where `order_id` = ? `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function readIdCRUD($id){
        $sql = "Select * from `order_detail` where `order_id` = ? and `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCRUD(model_OrderDetail $order_detail)
    {
        $sql = "INSERT INTO `order_detail`
        (`order_id`,`product_id`,`price`,`amount`,`total_detail`)
        VALUES
        (?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$order_detail->order_id);
        $statement->bindParam(2,$order_detail->product_id);
        $statement->bindParam(3,$order_detail->realPrice);
        $statement->bindParam(4,$order_detail->amount);
        $statement->bindParam(5,$order_detail->total_detail);
        return $statement->execute();
    }

    public function updateCRUD(model_OrderDetail $order_detail){
        $sql = "UPDATE `order_detail`
        SET
        `order_id` = ?,
        `product_id` = ?,
        `price` = ?,
        `amount` = ?,
        `total_detail` = ?
        WHERE `id` = ? and `id_delete` = 0";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$order_detail->order_id);
        $statement->bindParam(2,$order_detail->product_id);
        $statement->bindParam(3,$order_detail->realPrice);
        $statement->bindParam(4,$order_detail->amount);
        $statement->bindParam(5,$order_detail->total_detail);
        $statement->bindParam(6,$order_detail->id);
        return $statement->execute();
    }

    public function deleteCRUD($id){
        $sql = "UPDATE `order_detail` 
                SET `id_delete` = 1 
                WHERE `id` = ?";
         $statement = $this->pdo->prepare($sql);
         $statement->bindParam(1,$id);
         return $statement->execute();
    }
}
?>