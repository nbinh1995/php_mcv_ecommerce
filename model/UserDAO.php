<?php

class model_UserDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function adminLogin(model_User $user)
    {
        $sql = "Select * from user where email = ? and password = md5(?) and isAdmin=1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $user->email);
        $stmt->bindParam(2, $user->password);
        $stmt->execute();
        $result = $stmt->rowCount();
        return $result;
    }
    public function login(model_User $user)
    {  
        $sql = "SELECT id, email, password FROM user WHERE email = ?";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(1, $user->email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                // verify password
                if ($stmt->rowCount() == 1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        if (md5($user->password) === $hashed_password ) {
                            if(!isset($_SESSION)) { session_start(); }
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            return 1;
                        } else {
                            return 0;
                        }
                    }
                } else {
                    return -1;
                }
            } else {
                return -2;
            }
        }
    }
    public function existEmail($email)
    {
        $sql = "SELECT id FROM user WHERE email = :email";
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    return 0;
                } else {
                    return 1;
                }
            } else return -1;
        }
    }
    public function register(model_User $user)
    {
        $sql = "INSERT INTO `user`(`email`,`password`,`name`,`phone`,`address`)
        VALUES (:email,md5(:password),:name,:phone,:address)";
        // $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        if ($stmt = $this->pdo->prepare($sql)) {
            $stmt->bindParam(":email", $user->email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $user->password, PDO::PARAM_STR);
            $stmt->bindParam(":name", $user->name, PDO::PARAM_STR);
            $stmt->bindParam(":phone", $user->phone, PDO::PARAM_STR);
            $stmt->bindParam(":address", $user->address, PDO::PARAM_STR);
            if ($stmt->execute()) {
                return $this->pdo->lastInsertId();
            } else return false;
        }
    }

    public function changePass($user){
        $sql = "UPDATE `user`
        SET
        `password` = md5(?)
        WHERE `id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $user->password, PDO::PARAM_STR);
        $stmt->bindParam(2, $user->id);
        return $stmt->execute();
    }
    public function readIdCRUD($id){
        $sql = "Select * from user where `id`=?";
       $stmt = $this->pdo->prepare($sql);
       $stmt->bindParam(1,$id);
       $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result[0];
    }

    public function updateCRUD($user){
        $sql = "UPDATE `user`
        SET
        `email` = ?,
        `password` = ?,
        `name` = ?,
        `phone` = ?,
        `address` = ?
        WHERE `id` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $user->email, PDO::PARAM_STR);
        $stmt->bindParam(2, $user->password, PDO::PARAM_STR);
        $stmt->bindParam(3, $user->name, PDO::PARAM_STR);
        $stmt->bindParam(4, $user->phone, PDO::PARAM_STR);
        $stmt->bindParam(5, $user->address, PDO::PARAM_STR);
        $stmt->bindParam(6, $user->id);
         return $stmt->execute();

    }
    public function deleteCRUD($id){
        $sql = "DELETE FROM `user` WHERE `id`= ?;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id);
         return $stmt->execute();
    }

}
