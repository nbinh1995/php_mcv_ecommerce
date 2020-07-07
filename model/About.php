<?php
class model_About{
    public $id;
    public $delivery;
    public $phone;
    public $email;
    public $address;
   function __construct($delivery=null,$phone=null,$email=null,$address=null)
   {   
       $this->delivery=$delivery;
       $this->phone = $phone;
       $this->email = $email;
       $this->address = $address;
   }
}
?>