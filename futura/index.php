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


$query = mysqli_fetch_array(mysqli_query($con, "select * from user where id like '$bizid'"));
$flag=0;
if ($query['subpkg'] == "free")
{
    $flag=1;
}



?>



<!DOCTYPE html>
<html class="gr__livewp_site" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Home</title>
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

<body class="home-01 vsc-initialized" data-gr-c-s-loaded="true">

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
								<img src="img/logo_white.png" alt="">
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
								<li class="active">
									<a href="index.php">Home</a>
								
								</li>
								<li>
									<a href="courseexplore.php">Explore</a>
									
								</li>
								
								<!-- <li>
									<a href="upload.php">Upload</a>
								</li> -->
								<li>
									<a href="userpro.php">Userprofile</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<form class="search-bg" method="post" action="courseexplore.php">
								<label class="search-bg__title">Choose From A Range Of <span>Online Contents</span></label>
								<input class="search-bg__text" type="text" name="searchtxt" placeholder="What are of courses would you like for search?">
								<button class="search-bg__btn" type="submit" name="search">Search</button>
							</form>
						</div>
					</div>
					<!-- <div class="row">
						<div class="col-lg-12 text-center">
							<div class="owl-carousel owl-option-02 owl-loaded owl-drag">
								
								
								
								
								
								
								
								
								
								
							<div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-615px, 0px, 0px); transition: all 0s ease 0s; width: 2460px;"><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-01"></div>
										<h3 class="owl-option-02__title">
											Economy
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-02"></div>
										<h3 class="owl-option-02__title">
											Languages
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-03"></div>
										<h3 class="owl-option-02__title">
											Design
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-04"></div>
										<h3 class="owl-option-02__title">
											Biology
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-05"></div>
										<h3 class="owl-option-02__title">
											History
										</h3>
									</a>
								</div></div><div class="owl-item active" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-01"></div>
										<h3 class="owl-option-02__title">
											Economy
										</h3>
									</a>
								</div></div><div class="owl-item active" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-02"></div>
										<h3 class="owl-option-02__title">
											Languages
										</h3>
									</a>
								</div></div><div class="owl-item active" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-03"></div>
										<h3 class="owl-option-02__title">
											Design
										</h3>
									</a>
								</div></div><div class="owl-item active" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-04"></div>
										<h3 class="owl-option-02__title">
											Biology
										</h3>
									</a>
								</div></div><div class="owl-item active" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-05"></div>
										<h3 class="owl-option-02__title">
											History
										</h3>
									</a>
								</div></div><div class="owl-item" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-01"></div>
										<h3 class="owl-option-02__title">
											Economy
										</h3>
									</a>
								</div></div><div class="owl-item" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-02"></div>
										<h3 class="owl-option-02__title">
											Languages
										</h3>
									</a>
								</div></div><div class="owl-item" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-03"></div>
										<h3 class="owl-option-02__title">
											Design
										</h3>
									</a>
								</div></div><div class="owl-item" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-04"></div>
										<h3 class="owl-option-02__title">
											Biology
										</h3>
									</a>
								</div></div><div class="owl-item" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-05"></div>
										<h3 class="owl-option-02__title">
											History
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-01"></div>
										<h3 class="owl-option-02__title">
											Economy
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-02"></div>
										<h3 class="owl-option-02__title">
											Languages
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-03"></div>
										<h3 class="owl-option-02__title">
											Design
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-04"></div>
										<h3 class="owl-option-02__title">
											Biology
										</h3>
									</a>
								</div></div><div class="owl-item cloned" style="width: 113px; margin-right: 10px;"><div class="item">
									<a href="#" class="owl-option-02__box-01">
										<div class="owl-option-02__img-wrapp hov-img-05"></div>
										<h3 class="owl-option-02__title">
											History
										</h3>
									</a>
								</div></div></div></div><div class="owl-nav"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots disabled"></div></div>
						</div>
					</div> -->
				</div>
			</div>
		</header>

		<!-- Content -->
		<main class="content-row">
            
            
            <?php 
            if ($flag == 1)
            {
         ?>
            
            
            
            
			<div class="parallax parallax_01" data-type="background" data-speed="10">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="parallax-content-01">
								<h3 class="parallax-title">Trusted by Over
									<span>1000+</span> Students</h3>
								<div class="parallax-text">
									<p>Switch to premium for all available contents.</p>
								</div>
								<a href="#" class="parallax-btn">Go premium</a>
							</div>
						</div>
					</div>
				</div>
			</div>
            
            <?php
                   
            }
            ?>
            
			<!-- <div class="content-box-02">
				<div class="table-01">
					<div class="table-01__row">
						<div class="table-01__box-01">
							<div class="table-01__content">
								<h3 class="title-01">
									<span>Welcome</span> to Smart Education</h3>
								<div class="content-box-01__text">
									<p>There are coffee shops, sports, restaurants and a multitude 
of great study spots. Whether you are a prospective student or already 
taking classes, feel free to explore and see what makes "the campus on 
the hill" so special.</p>
								</div>
								<p class="author-info">
									- John S. Hogvaer,
									<span>Founder</span>
								</p>
								<div class="author-img">
									<img src="img/author_img.png" alt="">
								</div>
							</div>
						</div>
						<div class="table-01__box-02">
							<img class="table-01__img" src="img/img_01.jpg" alt="">
						</div>
					</div>
				</div>
			</div> -->
			<div class="content-box-01 padding-top-100 padding-sm-top-50">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-01">
								<h3 class="servises-item__title">Cloud Library</h3>
								<div class="servises-item__text">
									<p>Morbi eget maximus diam, vel rutrum orci. Curabitur dictum augue sit amet laoreet dignissim. Etiam feugiat nisl est.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-02">
								<h3 class="servises-item__title">Certifications</h3>
								<div class="servises-item__text">
									<p>Nunc ut elit tempus, faucibus orci vel, consequat odio. Praesent consectetur dignissim ullamcorper.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-03">
								<h3 class="servises-item__title">Video Lessons</h3>
								<div class="servises-item__text">
									<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae orci ac elit dapibus tincidunt.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-04">
								<h3 class="servises-item__title">Train Your Brain</h3>
								<div class="servises-item__text">
									<p>Morbi eget maximus diam, vel rutrum orci. Curabitur dictum augue sit amet laoreet dignissim. Etiam feugiat nisl est.</p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-05">
								<h3 class="servises-item__title">Master the Skils</h3>
								<div class="servises-item__text">
									<p>Nunc ut elit tempus, faucibus orci vel, consequat odio. Praesent consectetur dignissim ullamcorper. </p>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4">
							<div class="servises-item serv-item-06">
								<h3 class="servises-item__title">Graduate the Best</h3>
								<div class="servises-item__text">
									<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vitae orci ac elit dapibus tincidunt. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</main>

		<!-- Footer -->
		<footer class="wrapp-footer">
        <div class="footer-box-01">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <a href="" class="footer-logo">
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
                                    <a class="widget-contact__text-email"
                                        href="mailto:futura@edu.com">futura@edu.com</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!-- <div class="col-sm-3 col-md-3 col-lg-3">
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
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer-box-02">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <p class="copy-info">© 2020 Futura</p>
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
        <a href="#" class="back2top" title="Back to Top" style="display: none; bottom: 30px;">Back to Top</a>
    </footer>

	<!-- JQuery v2.2.4 -->
	<script src="js/jquery-2.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="js/jquery_002.js"></script>

	<!-- Owl carousel v2.2.1 -->
	<script src="js/jquery.js"></script>

	<!-- Main script -->
	<script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>