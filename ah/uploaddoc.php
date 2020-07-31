<?php
   require ("session.php");
   
   require 'controller/adminController.php';

   $adminController = new adminController;



    if(isset($sessionUsername)){

    }
    else{
       Print '<script>window.location.assign("ulogin.php");</script>';

    }

    

  



  if (isset($_POST["submit"]))
    {

$fileType= $_FILES["file"]["type"];

if(($fileType == "image/jgp") ||
    ($fileType == "image/jpeg") ||
    ($fileType == "image/png") )
{
    //check if file exixts
    if(file_exists("docs/".$_FILES["file"]["type"]))
    {
        echo "File already exists!";
    }
    else
    {
        move_uploaded_file($_FILES["file"]["tmp_name"], "docs/".$_FILES["file"]["name"]);
        echo "Uploaded in docs/".$_FILES["file"]["name"];
        $con= "docs/".$_FILES["file"]["name"];

        $adminController->docEntry($_POST['txtUserid'], $con  );
        
    }   
}
}



$title="Upload document";
$content='
<!-- ================ start banner area ================= --> 
  <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Upload Documents</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Documents uploading page</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ end banner area ================= -->
    <main class="site-main">
      <!--================Login Box Area =================-->
  <section class="login_box_area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="login_box_img">
            <div class="hover">
              <h4>Upload the documents</h4>
              <p>Upload the documents of the user which are authenticated</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="login_form_inner">
            <h3>Upload the documents:</h3>
            <form class="row login_form" action="" method="post" enctype="multipart/form-data" id="contactForm" >
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="name" name="txtUserid" placeholder="Username of the user" onfocus="this.placeholder = " " " onblur="this.placeholder = "Username of the user"" required>
              </div>
                <div class="col-md-12 form-group">
                <input type="file"  name="file" id="file" class="form-control"   placeholder="Description" onfocus="this.placeholder = " " " onblur="this.placeholder = "Description"" required>
              </div>
              <div class="col-md-12 form-group">
                <button type="submit" value="Upload" name="submit" class="button button-login w-100">Upload</button>
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>'; 
include 'master.php';
?>