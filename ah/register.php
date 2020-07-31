<?php
require 'controller/userController.php';
$userController = new userController;
$content="";
if(isset($_POST["submit"]))
    {
    	$content="<p class='error'> ";

    	$errors=$userController->registerUser();
        foreach ($errors as $error ) 
        {
        	$content=$content.$error.'<br/>';
        }

        $content=$content."</p>";
    }

                
$title="Registration Page";
$content='
<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Register</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Register</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>
	<!-- ================ end banner area ================= -->
  
  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="ulogin.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3>Create an account</h3>
						<form class="row login_form" action="" method="post" id="register_form" >
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="txtName" placeholder="name" onfocus="this.placeholder = " " " onblur="this.placeholder = "name" " required >
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="txtUsername" placeholder="Username" onfocus="this.placeholder = " " " onblur="this.placeholder = " Username" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="fathername" name="txtFname" placeholder="Father Name" onfocus="this.placeholder = " " onblur="this.placeholder = " Father Name" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="mothername" name="txtMname" placeholder="Mother Name" onfocus="this.placeholder = " " onblur="this.placeholder = " mother Name" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="txtAddress" placeholder="Address" onfocus="this.placeholder = " " onblur="this.placeholder = " Address" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phone number" name="txtPhone" placeholder="Contact Number" onfocus="this.placeholder = " " onblur="this.placeholder = " Contact Number" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="DOB" name="txtDob" placeholder="Date of Birth" onfocus="this.placeholder = " " onblur="this.placeholder = " Date of Birth" " required>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="txtEmail" placeholder="E-Mail" onfocus="this.placeholder = " " onblur="this.placeholder = " E-mail" " required>
							</div>


							<div class="col-md-12 form-group" style="text-align: left;">
								<label><b>Gender</b></label><br>
								<input type="radio" name="txtGender" value="male"> Male<br>
								<input type="radio" name="txtGender" value="female"> Female<br>
								<input type="radio" name="txtGender" value="other"> Other
							</div>

							<div class="col-md-12 form-group"style="text-align: left;">
								<label><b>Choose a Picture</b></label><br>
								<input type="text" class="form-control" id="phone number" name="txtImage" required>
								<!--<input type="file" name="txtImage" accept="image/*" id="Upload Image" onfocus="this.placeholder = " " " onblur="this.placeholder = "Upload Image" " required>-->
							</div>

							
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="txtPassword" placeholder="Password" onfocus="this.placeholder = " "" onblur="this.placeholder = "Password"" required>
              </div>
              <div class="col-md-12 form-group">
								<input type="password" class="form-control" id="confirmPassword" name="txtCPassword" placeholder="Confirm Password" onfocus="this.placeholder = " "" onblur="this.placeholder = "Confirm Password"" required>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name= "submit" class="button button-register w-100">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <!--================ Start footer Area  =================-->	
	<footer>
		<div class="footer-area footer-only">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets ">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly youre no 
								divided deep moved us lan Gathering thing us land years living.
							</p>
							<p>
								So seed seed green that winged cattle in. Gathering thing made fly youre no divided deep moved 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Brand</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget instafeed">
							<h4 class="footer_title">Gallery</h4>
							<ul class="list instafeed d-flex flex-wrap">
								<li><img src="img/gallery/r1.jpg" alt=""></li>
								<li><img src="img/gallery/r2.jpg" alt=""></li>
								<li><img src="img/gallery/r3.jpg" alt=""></li>
								<li><img src="img/gallery/r5.jpg" alt=""></li>
								<li><img src="img/gallery/r7.jpg" alt=""></li>
								<li><img src="img/gallery/r8.jpg" alt=""></li>
							</ul>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row d-flex">
					<p class="col-lg-12 footer-text text-center">
						<!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib cant be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area  =================-->';
	include 'master.php';
	?>
