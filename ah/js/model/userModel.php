<?php
require ("entities/userEntity.php");

//contain database related codes for users 

class userModel 
{
    function  registerUser(userEntity $user)
    {
    	$query= sprintf("INSERT INTO users
                        (name , username ,mname , fname, password, dob, address, gender, phone, image, email, verify, temp4  )
                        VALUES
                        ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
	 			   $user->name,
                   $user->username,
                   $user->mname,
                   $user->fname,
                   $user->password,
                   $user->dob,
                   $user->address,
                   $user->gender,
                   $user->phone,
                   $user->image,
                   $user->email,
                   $user->verify,
                   $user->temp4
	               
               
               
               );

    	$this->PerformQuery($query);
        
    }

        function loginUser($username, $pwd)
    {
        require 'credentials.php';
        session_start();
        
        //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from users WHERE username='$username'";
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

    function getUserById($id)
    {
        require 'credentials.php';
        //connection to database 
       //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from users WHERE id='$id'";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
       
        //get data form database
        while ($row = mysqli_fetch_array($result)) 
       {   
            //$id= $row[0]; 
            $name = $row[1];  
            $username= $row[2];
            $mname= $row[3];
            $fname= $row[4];
            $password= $row[5];
            $dob= $row[6];
            $address= $row[7] ;
            $gender= $row[8] ;
            $phone= $row[9];
            $image= $row[10] ;
            $email= $row[11];
            $verify= $row[12] ;
            $temp4 = $row[13];
           
           $user = new userEntity($id, $name, $username, $mname, $fname, $password, $dob, $address, $gender, $phone, $image, $email, $verify, $temp4 );
          
           
           
       }
       //close connection and return result
       mysqli_close($conn);
       return $user;
        
    }

    function getUserByUsername($username)
    {
        require 'credentials.php';
        //connection to database 
       //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
       
        $query = "SELECT * from users WHERE username='$username'";
         $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
       
        //get data form database
        while ($row = mysqli_fetch_array($result)) 
       {   
               $id= $row[0]; 
            $name = $row[1];  
            $username= $row[2];
            $mname= $row[3];
            $fname= $row[4];
            $password= $row[5];
            $dob= $row[6];
            $address= $row[7] ;
            $gender= $row[8] ;
            $phone= $row[9];
            $image= $row[10] ;
            $email= $row[11];
            $verify= $row[12] ;
            $temp4 = $row[13];
           
           $user = new userEntity($id, $name, $username, $mname, $fname, $password, $dob, $address, $gender, $phone, $image, $email, $verify, $temp4 );
          
           
           
       }
       //close connection and return result
       mysqli_close($conn);
       return $user;
        
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


    function deleteUser($id)
    {
       $query= "DELETE FROM users WHERE id = $id";
       $this->performQuery($query);
        
    }





   

    function sendNotification($latitude, $longitude,$userid ){

      $content= " There is an emergency case at Loction : <br>latitude = ".$latitude." and Longitude = ".$longitude." " ;
      $seen="unseen";
      $temp1=" ";
      $temp2=" ";

      $query= sprintf("INSERT INTO notifications
                        (userid , content ,seen , temp1, temp2 )
                        VALUES
                        ('%s','%s','%s','%s','%s')",
           $user->name,
                   $userid,
                   $content,
                   $seen,
                   $temp1,
                   $temp2
               );

      $this->PerformQuery($query);
                
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
