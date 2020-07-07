<?php
class model_AboutDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function readCRUD(){
        $sql = "Select * from about";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        $id = $this->pdo->lastInsertId();
        return $result[$id];
    }

    public function createCRUD(model_About $about)
    {
        $sql = "INSERT INTO `about`(`delivery`,`phone`,`email`,`address`) VALUES (?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$about->delivery);
        $statement->bindParam(2,$about->phone);
        $statement->bindParam(3,$about->email);
        $statement->bindParam(4,$about->address);
        return $statement->execute();
    }
    public function updateCRUD(model_About $about){
        $sql = "UPDATE `about`
                 SET `delivery` = ?, `phone` = ?,`email` = ?,`address` = ? WHERE `id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$about->delivery);
        $statement->bindParam(2,$about->phone);
        $statement->bindParam(3,$about->email);
        $statement->bindParam(4,$about->address);
        return $statement->execute();
    }
    public function deleteCRUD($id){
        $sql = "DELETE FROM `about` WHERE `id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute();
    }
}
?>