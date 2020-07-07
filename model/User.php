<?php

class model_User
{
    public $id;
    public $email;
    public $password;
    public $isAdmin;
    public $name;
    public $address;
    public $phone;

    public function __construct($email = null, $password = null,$name = null,$address=null,$phone=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->address= $address;
        $this->phone = $phone;
    }
}
