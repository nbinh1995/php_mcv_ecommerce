<?php
class model_imgProduct
{
   public $id;
   public $product_id;
   public $img;
   public function __construct($product_id=null, $img=null)
   {
      $this->product_id=$product_id;
      $this->img = $img;
   }
}
?>