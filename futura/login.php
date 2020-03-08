<?php 
include "db.php";
include "function.php"; 
session_start();
if ( !empty($_SESSION['bizid']) )
{
    header("location:index.php");

}



if(isset($_POST['log_user']))
{
if ( empty($_POST['email']) ||  empty($_POST['password']) )
    {
    
     echo "<script>alert('SORRY ALL FILEDS REQUIRED');window.location.assign('login.php'); </script>";
    }
    
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = encryptPassword($password);
    $query = "select * from  user where email = '$email' and password = '$password' " ;
     $result = mysqli_query($con,$query);
     if($result)
     {
         if (mysqli_num_rows($result) > 0)
         {
            $row = mysqli_fetch_array($result);
            $name = $row['username']; 
             $bizid = $row['id'];
             session_start();
             $_SESSION['bizid'] = $bizid;
             $_SESSION['name'] = $name;
             
              header("location:index.php");
             
         }
         else
         {
          echo "<script>alert('Invalid Userid or Password');window.location.assign('login.php'); </script>";
         }
     }
    else
    {
        die("QUERY fAiLED");
    }
}




?>

<!DOCTYPE html>
<html class="gr__livewp_site" lang="en">

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<style>
		.dismissButton {
			background-color: #fff;
			border: 1px solid #dadce0;
			color: #1a73e8;
			border-radius: 4px;
			font-family: Roboto, sans-serif;
			font-size: 14px;
			height: 36px;
			cursor: pointer;
			padding: 0 24px
		}

		.dismissButton:hover {
			background-color: rgba(66, 133, 244, 0.04);
			border: 1px solid #d2e3fc
		}

		.dismissButton:focus {
			background-color: rgba(66, 133, 244, 0.12);
			border: 1px solid #d2e3fc;
			outline: 0
		}

		.dismissButton:hover:focus {
			background-color: rgba(66, 133, 244, 0.16);
			border: 1px solid #d2e2fd
		}

		.dismissButton:active {
			background-color: rgba(66, 133, 244, 0.16);
			border: 1px solid #d2e2fd;
			box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 1px 3px 1px rgba(60, 64, 67, 0.15)
		}

		.dismissButton:disabled {
			background-color: #fff;
			border: 1px solid #f1f3f4;
			color: #3c4043
		}
	</style>
	<style>
		.gm-style .gm-style-mtc label,
		.gm-style .gm-style-mtc div {
			font-weight: 400
		}
	</style>
	<style>
		.gm-control-active>img {
			box-sizing: content-box;
			display: none;
			left: 50%;
			pointer-events: none;
			position: absolute;
			top: 50%;
			transform: translate(-50%, -50%)
		}

		.gm-control-active>img:nth-child(1) {
			display: block
		}

		.gm-control-active:hover>img:nth-child(1),
		.gm-control-active:active>img:nth-child(1) {
			display: none
		}

		.gm-control-active:hover>img:nth-child(2),
		.gm-control-active:active>img:nth-child(3) {
			display: block
		}
	</style>
	<link type="text/css" rel="stylesheet" href="css/css.css">
	<style>
		.gm-ui-hover-effect {
			opacity: .6
		}

		.gm-ui-hover-effect:hover {
			opacity: 1
		}
	</style>
	<style>
		.gm-style .gm-style-cc span,
		.gm-style .gm-style-cc a,
		.gm-style .gm-style-mtc div {
			font-size: 10px;
			box-sizing: border-box
		}
	</style>
	<style>
		@media print {

			.gm-style .gmnoprint,
			.gmnoprint {
				display: none
			}
		}

		@media screen {

			.gm-style .gmnoscreen,
			.gmnoscreen {
				display: none
			}
		}
	</style>
	<style>
		.gm-style-pbc {
			transition: opacity ease-in-out;
			background-color: rgba(0, 0, 0, 0.45);
			text-align: center
		}

		.gm-style-pbt {
			font-size: 22px;
			color: white;
			font-family: Roboto, Arial, sans-serif;
			position: relative;
			margin: 0;
			top: 50%;
			-webkit-transform: translateY(-50%);
			-ms-transform: translateY(-50%);
			transform: translateY(-50%)
		}
	</style>
	<style>
		.gm-style img {
			max-width: none;
		}

		.gm-style {
			font: 400 11px Roboto, Arial, sans-serif;
			text-decoration: none;
		}
	</style>
	<title>Login</title>
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
								<!-- <a class="contact-block-01__lang" href="#">Logout</a> -->

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
							<div class="search-block">
								<button class="search-btn">Search</button>
								<form action="./" class="search-block__form">
									<input class="search-block__form-text" type="text" name="search-name" placeholder="Search...">
								</form>
							</div>
							<!-- <ul class="main-nav__list sf-js-enabled sf-arrows" style="touch-action: pan-y;">
								<li>
									<a href="index.php" >Home</a>
								</li>
								<li>
									<a href="courseexplore.php" >Events</a>

								</li>
								
								<li>
									<a href="courses.php">Upload</a>
								</li>
								<li>
									<a href="userpro.php">Contacts</a>
								</li>
							</ul> -->
						</div>
					</div>
				</div>
			</div>
		</header>

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form class="user" method="post" action="">
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text"  name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password"  name="password" required>
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="forgotpass.php" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="btn-01" name="log_user" value="LOGIN">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="register_proces.php" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->


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
	</div>

	<!-- JQuery v.2.2.4 -->
	<script src="js/jquery-2.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="js/jquery.js"></script>

	<!-- Main script -->
	<script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span
		class="gr__triangle"></span></span>

</html>