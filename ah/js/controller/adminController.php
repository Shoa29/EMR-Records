<?php 

require ('./model/adminModel.php');

class adminController
{
	
	function registerAdmin()
	{
		    $errors = array();
		
        $username = $_POST["txtUsername"];
        $password= $_POST["txtPassword"];
        $category= $_POST["txtCategory"];
        $location = $_POST["txtLocation"];
        $name= $_POST["txtName"];
        $temp3=  " ";
        
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
        	$admin = new adminEntity(-1,  $username, $password, $category, $location, $name,  $temp3, $temp4);
	        $adminModel = new adminModel;
	        $adminModel->registerAdmin($admin);
	        array_push($errors,"Successfully registered!");
	        return $errors;
        }

        return $errors;


        
	}



        function loginAdmin()
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
                $adminModel = new adminModel;
                $adminModel->loginAdmin($username, $pwd);
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
        function getAdminById($id)
         {
      $adminModel = new adminModel;
      return $adminModel->getUserById($id);
        
         }


         function getAdminByUsername($username)
         {
          $adminModel = new adminModel;
          return $adminModel->getAdminByUsername($username);
        
         }


         function showNotification($username)
         {      $adminModel = new adminModel;
                $notificationArray=  $adminModel->getNotificationsByUsername($username);
                $result=" <div class='notification'>
                             <div class='unseen'>  ";
                foreach ($notificationArray as $key => $value) 
            
                      { 

                        if($value->seen == "unseen"){

                        $result= $result.'
                        <p>
                        '.$value->content.'
                        </p>
                        ';
                      }

              }
              $result=$result.'</div>';
              $result=$result.'<div class="unseen">'; 




              foreach ($notificationArray as $key => $value) 
            
                      { 

                        if($value->seen == "seen"){

                        $result= $result.'
                        <p>
                        '.$value->content.'
                        </p>
                        ';
                      }
              } 



              $result=$result.'</div> </div>'; 

         }


	
}





 ?>