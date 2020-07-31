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

        function createDocView($userid){

          $userModel = new userModel;
          $documentsArray = $userModel->getDocumentsByUsername($userid);

          $result=' ';
                foreach ($documentsArray as $key => $value) 
            
                      {

              $result=$result.'  
                        
                        <div class="gallery">
                         <a target="_blank" href='.$value->content.'>
                       <img src='.$value->content.' alt='.$value->content.' width="600" height="400">
                 </a>
                 
                       </div> <br><br><br>
                       ';

                        
                      }

              
             
              $result=$result.'  '; 


               return $result;






        }



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

         function generateQrCode($username){


          $content='<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=generateqr.php?username=".$username."&choe=UTF-8" title="generateqr.php?username=".$username."" />';


          echo $content;




         } 





         function sendNotification($latitude, $longitude ){
                $userModel = new userModel;
                $userModel->sendNotification($latitude, $longitude, $this->getUserId($latitude, $longitude) );
         }

         function getUserId($latitude, $longitude){
          require './model/credentials.php';

              $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 


              $tableName = "longlat";
              $origLat = $latitude;
              $origLon = $longitude;
              $dist = 6.21371 ; // 10 kms (1 mile = 1.60934 km) This is the maximum distance (in miles) away from $origLat, $origLon in which to search
              $query = "SELECT userid, latitude, longitude, 3956 * 2 * 
                        ASIN(SQRT( POWER(SIN(($origLat - latitude)*pi()/180/2),2)
                        +COS($origLat*pi()/180 )*COS(latitude*pi()/180)
                        *POWER(SIN(($origLon-longitude)*pi()/180/2),2))) 
                        as distance FROM $tableName WHERE 
                        longitude between ($origLon-$dist/cos(radians($origLat))*69) 
                        and ($origLon+$dist/cos(radians($origLat))*69) 
                        and latitude between ($origLat-($dist/69)) 
                        and ($origLat+($dist/69)) 
                        having distance < $dist ORDER BY distance limit 100"; 
              $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
              $min = 3600000000.2;
              $userid=" ";
              while($row = mysqli_fetch_assoc($result)) {
                   if($min>$row['distance'])
                   {
                        $userid=$row['userid'];
                        $min = $row['distance'];
                        
                   }
              }
               mysqli_close($conn);
              return $userid;
              
              

              


         }
	



}





 ?>