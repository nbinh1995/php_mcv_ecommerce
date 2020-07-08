<?php
class model_Categories{
    public $id;
    public $item_name;
    public $img;
    public $is_delete = null;
    function __construct($item_name=null,$img=null)
    {   
        $this->item_name=$item_name;
        $this->img=$img;
    }
}
?>