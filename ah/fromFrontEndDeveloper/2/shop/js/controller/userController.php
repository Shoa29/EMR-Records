<?php 

require ('./model/userModel.php');

class userController
{
	
	function registerUser()
	{
		$errors = array();
		
        $name= $_POST["txtName"];
        $username = $_POST["txtUsername"];
        $mname= $_POST["txtMname"];
        $fname= $_POST["txtFname"];
        $password= $_POST["txtPassword"];
        $dob= $_POST["txtDob"];
        $address = $_POST["txtAddress"];
        $gender= $_POST["txtGender"];
        $phone= $_POST["txtPhone"];
        $image= $_POST["txtImage"];
        $email= $_POST["txtEmail"];
        $verify = "<font color=red > Not verified </font>";
        $temp4= " ";
        $c_pwd= $_POST["txtCPassword"];
        
        if(empty($password))
        {
        	array_push($errors,"Password  is required");
        }
        if($password != $c_pwd)
        {
        	array_push($errors,"The two passwords do not match ");
        }
        if(count($errors)==0)
        {
        	$user = new userEntity(-1, $name, $username, $mname, $fname, $password, $dob, $address, $gender, $phone, $image, $email, $verify, $temp4);
	        $userModel = new userModel;
	        $userModel->registerUser($user);
	        array_push($errors,"Successfully registered!");
	        return $errors;
        }

        return $errors;


        
	}



        function loginUser()
        {
          $errors = array();
                
             
        $username = $_POST["txtUsername"];
        
        $pwd= $_POST["txtPassword"];
       
        
        
        
        if(empty($pwd))
        {
                array_push($errors,"Password  is required");
        }
        
        if(count($errors)==0)
        {      
                $userModel = new userModel;
                $userModel->loginUser($username, $pwd);
        }

        return $errors;


        
        }

        //create  



        function updateUserVerify($id, $bl )
            {
                
                
              $userModel = new userModel;
               $userModel->updateUserVerify($id, $bl);
                
            }

         
         //get function
        function getUserById($id)
         {
      $userModel = new userModel;
      return $userModel->getUserById($id);
        
         }


         function getUserByUsername($username)
         {
      $userModel = new userModel;
      return $userModel->getUserByUsername($username);
        
         }





         function sendNotification($latitude, $longitude, $userid ){
                $userModel = new userModel;
                $userModel->sendNotification($latitude, $longitude,$userid );
         }
	



}





 ?>