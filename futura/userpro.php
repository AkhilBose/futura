<?php
include "db.php";
include "function.php";
//$id = 1;//sesion id

session_start();
if ( !empty($_SESSION['name']) && !empty($_SESSION['bizid']) )
{
$bizid = $_SESSION['bizid'];  
$sname = $_SESSION['name'];
}
else
{
    header("location:error.php");
}

 $query = mysqli_fetch_array(mysqli_query($con,"select * from user where id like '$bizid'"));

?>




<!DOCTYPE html>
<html class="gr__livewp_site" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>UserProfile</title>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/favicon.ico">

	<!-- Bootstrap v3.3.7 -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Font Awesome 4.7.0 -->
	<link rel="stylesheet" href="css/font-awesome.css">

	<!-- Owl carousel -->
	<link rel="stylesheet" href="css/owl.css">

	<!-- Main style -->
	<link rel="stylesheet" href="css/style.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.css">
</head>

<body data-gr-c-s-loaded="true" class="vsc-initialized">
	<!--[if lt IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->

	<div class="wrapp-content">
		<!-- Header -->
		<header class="wrapp-header">
			<div class="info-box-01">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4 text-sm-center">
							<ul class="social-list-01">
								<li>
									<a href="#">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-google-plus" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-8 col-md-8 col-lg-8 text-sm-center text-right">
							<div class="contact-block-01">
								<a class="contact-block-01__email" href="mailto:thesmart@edu.com">thesmart@edu.com</a>
								<p class="contact-block-01__phone">826 696 8370</p>
								<a class="contact-block-01__lang" href="logout.php">Logout</a>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<a href="#" class="logo">
								<img src="img/logo_dark.png" alt="">
							</a>
							<div class="main-nav__btn">
								<div class="icon-left"></div>
								<div class="icon-right"></div>
							</div>
							<!-- <div class="search-block">
								<button class="search-btn">Search</button>
								<form action="./" class="search-block__form">
									<input class="search-block__form-text" type="text" name="search-name" placeholder="Search...">
								</form>
							</div> -->
							<ul class="main-nav__list sf-js-enabled sf-arrows" style="touch-action: pan-y;">
								<li>
									<a href="index.php" >Home</a>
								</li>
								<li>
									<a href="courseexplore.php">Explore</a>

								</li>
								
								<!-- <li>
									<a href="upload.php">Upload</a>
								</li> -->
								<li>
									<a href="userpro.php">UserProfile</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- Content -->
		<main class="content-row">
			<div class="content-box-01 single-team">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-md-7 col-lg-8">
							<figure class="single-team__img">
								<img src="img/team_single_01.jpg" alt="">
							</figure>
						</div>
						<div class="col-sm-6 col-md-5 col-lg-4">
							<div class="single-team__info">
								<h3 class="single-team__info-title"><?php echo $query['username']; ?></h3>
								<ul class="single-team__info-list">
									<li>
										<span>Email:</span> <?php echo $query['email']; ?>
									</li>
                                    <br>    <br>
									<li>
										<span>Ph NO:</span><?php echo $query['phno']; ?>
									</li>
                                        <br>    <br>
									<li>
										<span>Qualification:</span><?php echo $query['quali']; ?>
									</li>
                                        <br>    <br>
									<li>
										<span>Package Type</span> <?php echo $query['subpkg']; ?>
									</li>
                                        <br>    <br>
								
								</ul>
								<!-- <ul class="soc-list-01">
									<li>
										<a href="#" class="facebook-style">
											<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter-style">
											<i class="fa fa-twitter" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#" class="google-style">
											<i class="fa fa-google-plus" aria-hidden="true"></i>
										</a>
									</li>
									<li>
										<a href="#" class="pinterest-style">
											<i class="fa fa-pinterest" aria-hidden="true"></i>
										</a>
									</li>
								</ul> -->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
<!--
							<h3 class="margin-bottom-17">Biography</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
Phasellus quis lorem libero. Donec sit amet risus vel ipsum rhoncus 
mollis ut a purus. Sed ac nulla et nibh faucibus auctor in in sem. Nunc 
ante ligula, semper semper nunc eget, faucibus</p>
							<h3 class="padding-top-10 margin-bottom-17">Personal Experience</h3>
							<p>Vivamus eu ullamcorper mi. Morbi vitae lectus non ligula 
finibus luctus vitae molestie ex. Aenean bibendum metus quis nisi mollis
 iaculis. Donec ut ligula elit. Maecenas egestas feugiat nibh, et 
fringilla nisl gravida condimentum. Curabitur egestas</p>
-->
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<ul class="ul-list-01">
								<li>Maecenas egestas feugiat nibh</li>
								<li>Curabitur egestas lacus convallis</li>
								<li>Vivamus blandit fermentum turpis</li>
								<li>Cras eu hendrerit justo, eu faucibus</li>
								<li>Suspendisse enim ligula, faucibus</li>
							</ul>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<ul class="ul-list-01">
								<li>Donec commodo lacinia mi</li>
								<li>Curabitur ante quam, porttitor </li>
								<li>Praesent et nulla dui maximus</li>
								<li>In ac nibh in purus maximus </li>
								<li>Aenean pharetra condimentum </li>
							</ul>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4"></div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<h3 class="margin-bottom-20">Languages</h3>
							<p>English (fluet), Spanish (fluent), Italian, Greek.</p>
						</div>
					</div> -->
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-form">
								<h3 class="reply-form__title margin-top-20 margin-bottom-34"></h3>
<!--
								<form action="useredit.php" class="reply-form__form">
									 <div class="reply-form__box-01">
										<input class="reply-form__name" type="text" name="login" placeholder="Name *">
									</div>
									<div class="reply-form__box-02">
										<input class="reply-form__email" type="email" name="login" placeholder="Email *">
									</div>
									<div class="reply-form__box-03">
										<input class="reply-form__url" type="url" name="website" placeholder="Website">
									</div>
									<div class="reply-form__box-04">
										<textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Message..."></textarea>
									</div> 
									<div class="reply-form__box-05">
										<button class="btn-01" type="submit">Edit Profile</button>
									</div>
								</form>
-->
                                
                                <a  href="useredit.php" class="btn-01"> Edit Profile</a>
							</div>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-lg-12">
							<div class="reply-form">
								<h3 class="reply-form__title margin-top-20 margin-bottom-34">Contact Me</h3>
								<form action="./" class="reply-form__form">
									<div class="reply-form__box-01">
										<input class="reply-form__name" type="text" name="login" placeholder="Name *">
									</div>
									<div class="reply-form__box-02">
										<input class="reply-form__email" type="email" name="login" placeholder="Email *">
									</div>
									<div class="reply-form__box-03">
										<input class="reply-form__url" type="url" name="website" placeholder="Website">
									</div>
									<div class="reply-form__box-04">
										<textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Message..."></textarea>
									</div>
									<div class="reply-form__box-05">
										<button class="btn-01" type="submit">Send message</button>
									</div>
								</form>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</main>

		<!-- Footer -->
		<footer class="wrapp-footer">
			<div class="footer-box-01">
				<div class="container">
					<div class="row">
						<div class="col-sm-3 col-md-3 col-lg-3">
							<a href="#" class="footer-logo">
								<img src="img/logo_white.png" alt="">
							</a>
							<ul class="widget-contact">
								<li>
									<h4 class="widget-contact__title">Location:</h4>
									<p class="widget-contact__text">47 Destiny Common, South Jolieview</p>
								</li>
								<li>
									<h4 class="widget-contact__title">Office Hours:</h4>
									<p class="widget-contact__text">8:00am - 5:00pm</p>
								</li>
								<li>
									<h4 class="widget-contact__title">Telephone:</h4>
									<p class="widget-contact__text">826-696-8370</p>
								</li>
								<li>
									<h4 class="widget-contact__title">Email:</h4>
									<p class="widget-contact__text">
										<a class="widget-contact__text-email" href="mailto:futura@edu.com">futura@edu.com</a>
									</p>
								</li>
							</ul>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3">
							<div class="widget-link">
								<h3 class="widget-title">Explore</h3>
								<ul class="widget-list">
									<li>
										<a href="#">History &amp; Mission</a>
									</li>
									<li>
										<a href="#">Administration</a>
									</li>
									<li>
										<a href="#">Community</a>
									</li>
									<li>
										<a href="#">Around the World</a>
									</li>
									<li>
										<a href="#">News Network</a>
									</li>
									<li>
										<a href="#">Visitor Information</a>
									</li>
									<li>
										<a href="#">Social Media</a>
									</li>
									<li>
										<a href="#">Our Campuses</a>
									</li>
									<li>
										<a href="#">Campus Directories</a>
									</li>
									<li>
										<a href="#">Employment</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3">
							<div class="widget-link">
								<h3 class="widget-title">Admissions</h3>
								<ul class="widget-list">
									<li>
										<a href="#">Undergraduate</a>
									</li>
									<li>
										<a href="#">By School</a>
									</li>
									<li>
										<a href="#">Process</a>
									</li>
									<li>
										<a href="#">Visitor Information</a>
									</li>
									<li>
										<a href="#">For Prospective Parents</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3">
							<div class="widget-link">
								<h3 class="widget-title">Research</h3>
								<ul class="widget-list">
									<li>
										<a href="#">Applied Physics Laboratory</a>
									</li>
									<li>
										<a href="#">Research Projects Administration</a>
									</li>
									<li>
										<a href="#">Funding Opportunities</a>
									</li>
									<li>
										<a href="#">Undergraduate Research</a>
									</li>
									<li>
										<a href="#">Resources</a>
									</li>
									<li>
										<a href="#">Health &amp; Medicine</a>
									</li>
									<li>
										<a href="#">Social Sciences, Humanities &amp; Arts</a>
									</li>
									<li>
										<a href="#">Natural Sciences, Engineering &amp; Tech</a>
									</li>
									<li>
										<a href="#">Global Research</a>
									</li>
									<li>
										<a href="#">Technology Transfer</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-box-02">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<p class="copy-info">© 2017 Smart Education. All Rights Reserved</p>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 text-center">
							<ul class="social-list-01">
								<li>
									<a href="#">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-google-plus" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="footer-info">
								<a class="footer-info__01" href="#">Privacy Policy</a>
								<a class="footer-info__02" href="#">Terms Of use</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="#" class="back2top" title="Back to Top" style="display: block; bottom: 30px;">Back to Top</a>
		</footer>
	</div>

	<!-- JQuery v2.2.4 -->
	<script src="js/jquery-2.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="js/jquery.js"></script>

	<!-- Main script -->
	<script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
