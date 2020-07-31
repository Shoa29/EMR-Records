
<?php 

if(isset($_GET['id'])){
 
$id= $_GET['id'];


  function performQuery($query)
    {
        require 'model/credentials.php';
        //connection to database 
        $conn = mysqli_connect($host,$user,$password)  or die(mysqli_error()) ;
        //select database
        mysqli_select_db($conn,$database) ; 
        //Perform Query
        mysqli_query($conn,$query) or die(mysqli_error($conn));

    }

function updateNotification()
            {
               $id= $_GET['id'];

              $seen="seen";
               $query= sprintf("UPDATE notifications
                                  SET seen = '%s'
                               WHERE  id= $id       
        " , 
                       $seen
                      );
               PerformQuery($query);
                
            }





        
    updateNotification();

 Print '<script>window.location.assign("index.php");</script>';
}

else{
   Print '<script>window.location.assign("index.php");</script>';

}

     ?>