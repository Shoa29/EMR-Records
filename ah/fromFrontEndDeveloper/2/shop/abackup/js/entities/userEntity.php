<?php

class userEntity
{
    public $id;
    public $name;
    public $username;
    public $mname;
    public $fname;
    public $password;
    public $dob;
    public $address;
    public $gender;
    public $phone;
    public $image;
    public $email;
    public $verify;
    public $temp4;

  
    function __construct($id, $name, $username, $mname, $fname, $password, $dob, $address, $gender, $phone, $image, $email, $verify, $temp4  )
     {
        $this->id= $id;
        $this->name= $name;
        $this->username= $username;
        $this->mname= $mname;
        $this->fname= $fname;
        $this->password= $password;
        $this->dob = $dob;
        $this->address= $address;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->image= $image;
        $this->email= $email;
        $this->verify= $verify;
        $this->temp4 = $temp4;
     }   
    
}

?>
