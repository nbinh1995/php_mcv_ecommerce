<?php
class model_Banner{
    public $id;
    public $title;
    public $content;
    public $img_banner;
   function __construct($title=null,$content=null,$img_banner=null)
   {   
       $this->title=$title;
       $this->content = $content;
       $this->img_banner = $img_banner;
   }
}
?>