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

         function docEntry($userid, $content)
         {
          $adminModel = new adminModel;
          $adminModel->docEntry($userid, $content);



         }


         function showNotification($username)

         {    
                echo $username;
                
                $adminModel = new adminModel;
                $notificationArray=  $adminModel->getNotificationsByUsername($username);

                $result='<div class="alert alert-light" role="alert">
                   <h2>Notifications</h2>
                  </div>
                  <div class="alert alert-danger" role="alert">
                  <h3>Unseen!</h3> ';
                foreach ($notificationArray as $key => $value) 
            
                      { 

                        if($value->seen == "unseen"){

                        $result= $result.'  '
                        .$value->content.'  <a class="button button-hero" href=updateSeen.php?id='.$value->id.'> Mark seen </a> <br> <br> ';
                      }

              }
             
              $result=$result.'</div>
                <div class="alert alert-success" role="alert">
             <h3>Seen!</h3>'; 




              foreach ($notificationArray as $key => $value) 
            
                      { 

                        if($value->seen == "seen"){

                        $result= $result.
                        '   '.$value->content.' <br>  ';
                      }
              } 



              $result=$result.'</div> '; 

              return $result;

         }


	
}





 ?>