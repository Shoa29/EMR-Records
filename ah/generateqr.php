
<?php 

require ("session.php");
   
require 'controller/userController.php';

if(isset($sessionUsername)){

    }
    else{
       Print '<script>window.location.assign("ulogin.php");</script>';

    }


     $userController = new userController;

     require 'controller/adminController.php';
    $adminController = new adminController;
  






//jy

if(isset($_GET['username'])){
 
$username= $_GET['username'];


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

function showQr()
            {
              $username= $_GET['username'];
               
              $content='<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://localhost/ah/generatedata.php?usernamesent='.$username.'&choe=UTF-8" title="http://localhost/ah/generatedata.php?usernamesent='.$username.'" />';

              return $content;
                
            }





    
   

 
}

else{
   Print '<script>window.location.assign("index.php");</script>';

}





 


$title="Home";
$content='
    <main class="site-main">
    
    <!--================ Hero banner start =================-->
       
         <center>
     <h1> Your generated QR Code </h1>
     '.showQr().'
       </center>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>'; 
include 'master.php';
?>




