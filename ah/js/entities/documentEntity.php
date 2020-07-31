<?php

class documentEntity
{
    public $id;
	public $userid;
    public $content;
    public $temp1;
    public $temp2;


  
    function __construct($id, $userid, $content, $temp1, $temp2)
     {
        $this->id= $id;
        $this->userid= $userid;
        $this->content= $content;
        $this->temp1 = $temp1;
        $this->temp2 = $temp2;  
     }   
    
}

?>