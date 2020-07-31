<?php
   require ("session.php");
   
   require 'controller/userController.php';

    if(isset($sessionUsername)){

    }
    else{
       Print '<script>window.location.assign("ulogin.php");</script>';

    }

    $userController = new userController;
   if(isset($_GET['long'])){
              
     $userController->sendNotification($_GET['lat'],$_GET['long']);
   }

   require 'controller/adminController.php';
    $adminController = new adminController;
  

$title="Home";
$content='
    <main class="site-main">
    
    <!--================ Hero banner start =================-->
    <section class="her$adminControllero-banner">
      <div class="container"><br>
      '.$adminController->showNotification($sessionUsername).'
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">

            <div class="hero-banner__img">

              <img class="img-fluid" src="img/img1.jpg" alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>The Digital Id for Digital World</h4>
              <h1>E-ID</h1>
              <p>•  This will generate the QR code according to the detail to be shared.<br>
                • This Emergency button will take your location and share to the nearest employee according to the requirements.<br>
                • The Scan QR code will help us to scan others QR code will helps to share the necessity information according to the needs.<br>
                • The Near by hospitalbutton helps us to find the location of nearest hospitals

                <br>
</p>
                            <script>
              var x = document.getElementById("demo");

              function getLocation() {
                if (navigator.geolocation) {
                  navigator.geolocation.getCurrentPosition(showPosition);
                } else { 
                  x.innerHTML = "Geolocation is not supported by this browser.";
                }
              }

              function showPosition(position) {
                var lat = position.coords.latitude; 
                var long = position.coords.longitude;
                var getUrl= "index.php?lat="+lat+"&long="+long;
                window.location.assign(getUrl);
              }
              </script>
              <a class="button button-hero" onclick="getLocation()" href="#">Emergency</a><br>
                
                 
              <br>

              <script>
              var x = document.getElementById("demo");

              function generateQr() {
                
                  var getUrl= "generateqr.php?username='.$sessionUsername.'";
                window.location.assign(getUrl);
                
              }

             
              </script>
              <a class="button button-hero" onclick="generateQr()" href="#">Generate QR Code</a><br><br>
              <a class="button button-hero" href="https://www.google.com/maps/search/nearest+hospital/@31.2444389,75.6409708,12z/data=!3m1!4b1">Near By Hospitals</a>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================ Hero banner start =================-->
    <!-- ================ Subscribe section start ================= --> 
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Get Update From Anywhere</h3>
          <p>Bearing Void gathering light light his eavening unto dont afraid</p>
          <div id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = " " "onblur="this.placeholder = Your Email Address " >
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= --> 

    

  </main>'; 
include 'master.php';
?>


