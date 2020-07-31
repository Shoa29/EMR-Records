<?php
require ("entities/adminEntity.php");

//contain database related codes for users 

class adminModel 
{
    function  registerAdmin(adminEntity $admin)
    {
    	$query= sprintf("INSERT INTO admins
                        (username ,password , category, location, name, temp3, temp4)
                        VALUES
                        ('%s','%s','%s','%s','%s','%s','%s')",
	 			   
                   $admin->username,
                   $admin->password,
                   $admin->category,
                   $admin->location,
                   $admin->name,
                  
                   $admin->temp3,
                   $admin->temp4
	               
               
               
               );

    	$this->PerformQuery($query);
        
    }

        function loginAdmin($username, $pwd)
    {
        require 'credentials.php';
        session_start();
        
        //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from admins WHERE username='$username'";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        //Query the users table if there are matching rows equal to $username
        $exists = mysqli_num_rows($result);
        //Checks if username exists
        $table_users = "";
        $table_password = "";
        if($exists > 0) //IF there are no returning rows or no existing username
        {
        while($row = mysqli_fetch_assoc($result)) //display all rows from query
        {
        $table_users = $row['username'];
        // the first username row is passed on to $table_users, and so on until the query is finished 
        $table_password = $row['password']; // the first password row is passed on to $table_users, 
        }
        if(($username == $table_users) && ($pwd == $table_password))
        // checks if there are any matching fields
        {
        if($pwd == $table_password)
        {
        $_SESSION['username'] = $username; //set the username in a session.
        header("location: index.php"); // redirects the user to the authenticated home page
        }
        }
        else
        {
        Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php


        }
        }
        else
                {
        Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
                } 




    }

    function getAdminById($id)
    {
        require 'credentials.php';
        //connection to database 
       //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from admins WHERE id='$id'";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
       
        //get data form database
        while ($row = mysqli_fetch_array($result)) 
       {   
            //$id= $row[0]; 
             
            $username= $row[1];
            
            $password= $row[2];
            $category= $row[3];
            $location= $row[4] ;
            $name= $row[5] ;
            $temp3= $row[6];
            $temp4= $row[7] ;
            
           
           $admin = new adminEntity($id, $username, $password, $category, $location, $name,  $temp3, $temp4 );
          
           
           
       }
       //close connection and return result
       mysqli_close($conn);
       return $admin;
        
    }

    function getAdminByUsername($username)
    {
        require 'credentials.php';
        //connection to database 
       //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from admins WHERE username='$username'";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
       
        //get data form database
        while ($row = mysqli_fetch_array($result)) 
       {   
            $id= $row[0]; 
             
            $username= $row[1];
            
            $password= $row[2];
            $category= $row[3];
            $location= $row[4] ;
            $name= $row[5] ;
            $temp3= $row[6];
            $temp4= $row[7] ;
            
           
           $admin = new adminEntity($id, $username, $password, $category, $location, $name,  $temp3, $temp4 );
          
           
           
       }
       //close connection and return result
       mysqli_close($conn);
       return $admin;
        
    }

    
    function deleteAdmin($id)
    {
       $query= "DELETE FROM admins WHERE id = $id";
       $this->performQuery($query);
        
    }

    function updateUserVerify($id , $bl  )
    {   
        if($bl=="true"){
            $verify = "<font color=green >  verified  </font>";

        }
        else {
            $verify = "<font color=red > Not verified  </font>";

        }

       $query= sprintf("UPDATE users
                          SET verify = '%s' 
                       WHERE  id= $id       
    " ,   $verify
              );
       $this->performQuery($query);
        
    }


      function  getNotificationsByUsername($username){

         require 'credentials.php';
        //connection to database 
       //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
        $query = "SELECT * from notifications WHERE userid='$username'";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        //get data form database
        $notificationArray = array();
        while ( $row = mysqli_fetch_array($result)) 
       {   
            $id= $row[0]; 
             
            
            $content= $row[2];
            $seen= $row[3];
            $temp1= $row[4] ;
            $temp2= $row[5] ;
            
           
           $notification = new adminEntity($id, $username, $content, $seen, $temp1, $temp2);
           array_push($notificationArray, $notification);
           
           
       }
       //close connection and return result
       mysqli_close($conn);
       return $notificationArray;
        
      }






    function performQuery($query)
    {
        require 'credentials.php';
        //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
        mysqli_query($conn,$query) or die(mysqli_error($conn));

    }
    
}

?>
