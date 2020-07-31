<?php

class notificationEntity
{
    public $id;
	public $userid;
    public $content;
    public $seen;
    public $temp1;
    public $temp2;


  
    function __construct($id, $userid, $content, $seen, $temp1, $temp2)
     {
        $this->id= $id;
        $this->userid= $userid;
        $this->content= $content;
        $this->seen = $seen;
        $this->temp1 = $temp1;
        $this->temp2 = $temp2;  
     }   
    
}

?>
