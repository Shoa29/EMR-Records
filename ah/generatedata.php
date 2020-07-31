<?php
require ("session.php");
require ("controller/userController.php");
//echo $sessionUsername;
if(isset($sessionUsername )){

}
else{
   Print '<script>window.location.assign("ulogin.php");</script>';
}


if(isset($_GET['usernamesent'] )){

$usernamesent = $_GET['usernamesent'];

}
else{
   Print '<script>window.location.assign("index.php");</script>';
}

      $userController = new userController;
      $user= $userController->getUserByUsername($sessionUsername);

$userid=$usernamesent;


$title="Profile";
$content='
         <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Verified Documents</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            <li class="active"> / documents</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

<section id="mu-course-content">
   <div class="container">

   <center>
<h2></h2>
<h4>Resize the browser window to see the effect.</h4>

'.$userController->createDocView($userid).'






</center>

              
         </div>
 </section>


';




include 'master.php';

?>




 