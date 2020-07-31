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
    $user= $userController->getUserByUsername($usernamesent);


$title="Profile";
$content='
         <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Profile Page</h2>
           <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>            
            <li class="active"> / Profile</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

<section id="mu-course-content">
   <div class="container">
              <div class="pro">
  
  <center><img class="img" src='. $user->image.' height="250px;" width="200px"><h1>'. $user->name.'</h1></center>
  <div class="Cont">
  <div class="alert alert-warning">
    <strong>User Name: </strong><a class="alert-link">'. $user->username.'</a>.
  </div>
    <div class="alert alert-info">
    <strong>Father Name: </strong> <a class="alert-link">'. $user->fname.'</a>.
  </div>
  <div class="alert alert-warning">
    <strong>Mother Name: </strong><a class="alert-link">'. $user->mname.'</a>.
  </div>

    <div class="alert alert-info">
    <strong>DOB: </strong> <a class="alert-link">'. $user->dob.'</a>.
  </div>
  <div class="alert alert-warning">
    <strong>Gender: </strong><a class="alert-link">'. $user->gender.'</a>.
  </div>
    <div class="alert alert-info">
    <strong>Contact Number: </strong> <a class="alert-link">'. $user->phone.'</a>.
  </div>
  <div class="alert alert-warning">
    <strong>E-mail: </strong><a class="alert-link">'. $user->email.'</a>.
  </div>

    <div class="alert alert-info">
    <strong>Address: </strong> <a class="alert-link"> '. $user->address.' </a>.
  </div>
  </div>
</div>
         </div>
 </section>


';




include 'master.php';

?>




 