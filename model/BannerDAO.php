<?php
class model_BannerDAO{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function readCRUD(){
        $sql = "Select * from banner";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function createCRUD(model_Banner $banner)
    {
        $sql = "INSERT INTO `banner`(`title`,`content`,`img_banner`) VALUES (?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$banner->title);
        $statement->bindParam(2,$banner->content);
        $statement->bindParam(3,$banner->img_banner);
        return $statement->execute();
    }
    public function updateCRUD(model_Banner $banner){
        $sql = "UPDATE `banner`
                 SET `title` = ?, `content` = ?,`img_banner` = ? WHERE `id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$banner->title);
        $statement->bindParam(2,$banner->content);
        $statement->bindParam(3,$banner->img_banner);
        $statement->bindParam(4,$banner->id);
        return $statement->execute();
    }
    public function deleteCRUD($id){
        $sql = "DELETE FROM `banner` WHERE `id` = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(1,$id);
        return $statement->execute();
    }
}
?>