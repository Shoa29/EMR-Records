<?php

class adminEntity
{
    public $id;
	public $username;
    public $password;
    public $category;
    public $location;
    public $name;
    public $temp3;
    public $temp4;

  
    function __construct($id, $username, $password, $category, $location, $name,  $temp3, $temp4 )
     {
        $this->id= $id;
        $this->username= $username;
        $this->password= $password;
        $this->category = $category;
        $this->location= $location;
        $this->name = $name;
        $this->temp3 = $temp3;
        $this->temp4 = $temp4;
     }   
    
}

?>
