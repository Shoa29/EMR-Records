
<?php 

if(isset($_GET['userid'])){
  $userid= $_GET['userid'];

function updateNotification()
            {

              $seen="seen";
               $query= sprintf("UPDATE notifications
                                  SET seen = '%s'
                               WHERE  userid= $userid       
        " , 
                       $seen
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

    updateNotification($userid);


}

else{

}

     ?>