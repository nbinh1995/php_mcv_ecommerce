<?php
class model_Product{
    public $id;
   public $categories_detail_id;
   public $name;
   public $content;
   public $price;
   public $discount;
   public $created;
   public $isNew;
   public $isHot;
   public $is_delete;
   public function __construct($categories_detail_id=null,$name=null,$content=null,$price=null,
   $discount=null,$isNew=0,$isHot=0)
   {
       $this->categories_detail_id = $categories_detail_id;
       $this->name = $name;
       $this->content = $content;
       $this->price = $price;
       $this->discount = $discount;
       $this->isNew = $isNew;
       $this->isHot = $isHot;
   }
//    public $img = null;
}
?>