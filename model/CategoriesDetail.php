<?php
class model_Categoriesdetail{
    public $id;
    public $categories_id;
    public $item_name;
    public $is_delete = 0;
    function __construct($categories_id=null,$item_name=null)
    {   
        $this->categories_id=$categories_id;
        $this->item_name=$item_name;
        
    }
}
?>