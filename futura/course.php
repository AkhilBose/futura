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


if(isset($_POST['pcom']))
{
    $cid = mysqli_real_escape_string($con,$_POST['cid']);
    $message = mysqli_real_escape_string($con,$_POST['message']);
    mysqli_query( $con, "insert into comments(fileid,commentdata,cowner)  values('$cid','$message','$sname')");
    
    
}




if (isset($_POST['viewcourse']))
{
       $idd = mysqli_real_escape_string($con,$_POST['idd']);
}
  $query = mysqli_fetch_array(mysqli_query($con,"select * from upfiles where id like '$idd'"));

?>

<!DOCTYPE html>
<html class="gr__livewp_site" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Smart education | Single course</title>
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
							<div class="search-block">
								<button class="search-btn">Search</button>
								<form action="./" class="search-block__form">
									<input class="search-block__form-text" type="text" name="search-name" placeholder="Search...">
								</form>
							</div>
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
			<div class="content-box-01 single-course">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<figure class="single-course-img">
								<img src="img/course_01.jpg" alt="">
							</figure>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
                            
<!--
                            
							<ul class="single-course__star-list">
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fa fa-star" aria-hidden="true"></i>
									</a>
								</li>
							</ul>
                            
                            
-->
<!--
                            
							<ul class="single-course__info-list">
								<li>
									<p class="category">Design</p>
								</li>
								<li>
									<p class="lessons">50 Lessons</p>
								</li>
								<li>
									<p class="seats">25 Seats</p>
								</li>
							</ul>
                            
                            
-->
                            
                            
							<div class="single-course__wrapp">
								<h2 class="single-course__title"><?php  //echo $query['title']; ?></h2>
                                
								<p class="single-course__price-info">download file </p>
                                
                                
							</div>
							<div class="tabs single-course-tabs">
								<ul class="tabs__caption">
									<li class="active">Overview</li>
									<li class="">Curriculum</li>
									<li class="">Teachers</li>
								</ul>
								<div class="tabs__content">
									<p>Graphic design is the process of visual communication and 
problem-solving using one or more of typography, photography and 
illustration. The field is considered a subset of visual communication 
and communication design, but sometimes the term
										<a href="#">"graphic design"</a> is used synonymously. Graphic
 designers create and combine symbols, images and text to form visual 
representations of ideas and messages. They use typography, visual arts 
and page layout techniques to create visual compositions.
										Common uses of graphic design include corporate design (logos 
and branding), editorial design (magazines, newspapers and books), 
wayfinding or environmental design, advertising, web design, 
communication design, product packaging. </p>
									<p>A graphic design project may involve the stylization and 
presentation of existing text and either preexisting imagery or images 
developed by the graphic designer. Elements can be incorporated in both 
traditional and digital form, which involves
										the use of visual arts, typography, and page layout 
techniques. Graphic designers organize pages and optionally add graphic 
elements.
										<i>
											<u>Graphic designers can commission photographers</u>
										</i> or illustrators to create original pieces. Designers use 
digital tools, often referred to as interactive design, or multimedia 
design. Designers need communication skills to convince an audience and 
sell their designs.The
										<a href="#">"process school"</a> is concerned with 
communication; it highlights the channels and media through which 
messages are transmitted and by which senders and receivers encode and 
decode these message. The semiotic school treats a message as a 
construction
										of signs which through interaction with receivers, produces 
meaning; communication as an agent.</p>
								</div>
								<div class="tabs__content">
									<ul class="curriculum-list">
										<li>
											<h5 class="curriculum-list__title-01">First Level</h5>
											<ul>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 1.</span> Introduction to UI Design
													</div>
													<span class="curriculum-list__time">120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 2.</span> User Research and Design
													</div>
													<span class="curriculum-list__time">60 minutes</span>
												</li>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 3.</span> Evaluating User Interfaces Part 1
													</div>
													<span class="curriculum-list__time">85 minutes</span>
												</li>
											</ul>
										</li>
										<li>
											<h5 class="curriculum-list__title-01">Second Level</h5>
											<ul>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 1.</span> Prototyping and Design
													</div>
													<span class="curriculum-list__time">110 minutes</span>
												</li>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 2.</span> UI Design Capstone
													</div>
													<span class="curriculum-list__time">120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Lesson 3.</span> Evaluating User Interfaces Part 2
													</div>
													<span class="curriculum-list__time">120 minutes</span>
												</li>
											</ul>
										</li>
										<li>
											<h5 class="curriculum-list__title-01">Final</h5>
											<ul>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Part 1.</span> Final Test
													</div>
													<span class="curriculum-list__time">120 minutes</span>
												</li>
												<li>
													<div class="curriculum-list__box">
														<span class="curriculum-list__title-02">Part 2.</span> Online Test
													</div>
													<span class="curriculum-list__time">120 minutes</span>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<div class="tabs__content active">
									<div class="teachers-wrapp">
										<div class="row">
											<div class="col-sm-4 col-md-4 col-lg-4">
												<figure class="teachers__img">
													<img src="img/course_02.jpg" alt="">
												</figure>
											</div>
											<div class="col-sm-8 col-md-8 col-lg-8">
												<div class="teachers__box-01">
													<h4 class="teachers__title">Karren Johnson</h4>
													<ul class="teachers__list">
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
												<p class="teachers__subtitle">Teacher of Graphic Design</p>
												<div class="teachers__content">
													<p>A graphic design project may involve the stylization and
 presentation of existing text and either preexisting imagery or images 
developed by the graphic designer. Elements can be inco rporated in both
 traditional and digital form, which involves
														the use of visual arts, typography, and page layout 
techniques.</p>
												</div>
												<a class="teachers__btn" href="#">Read More</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="single-course__btn-wrapp">
								<button class="btn-01" type="button">buy course</button>
							</div>
						</div>
					</div>
                    <?php
                    if (isset($cid)){
                             $qq= mysqli_query($con, "select * from comments where fileid like '$cid'");
                        
                    }
               
                        if (isset($idd)){
                             $qq= mysqli_query($con, "select * from comments where fileid like '$idd'");
                        
                    }
                    
                    ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-form">
								<h3 class="reply-form__title">Comments</h3>
                                
                                <?php
                                if (mysqli_num_rows($qq) == 0)
                                { 
                                    echo "<h3>No Comments Yet</h3>";
                                }
                                
                                while ($r = mysqli_fetch_array($qq))
                                {
                             
                                ?>
                                
                                <p> <?php echo $r['commentdata']; ?><span style="float:right"> <?php echo $r['cowner']; ?></span> </p> <hr>
<!--



                                	<div class="reply-form__box-04">
										<textarea class="reply-form__message" cols="30" rows="10"  value="<?php echo $r['commentdata']; ?>" ></textarea>
									</div>
-->
                                
                                <?php
                                
                                 }
                                
                                
                                ?>
								</div>
								</div>
								</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="reply-form">
								<h3 class="reply-form__title">Leave a Comment</h3>
								<form action=""  method="post" class="reply-form__form">
									<!-- <div class="reply-form__box-01">
										<input class="reply-form__name" type="text" name="login" placeholder="Name *">
									</div>
									<div class="reply-form__box-02">
										<input class="reply-form__email" type="email" name="login" placeholder="Email *">
									</div>
									<div class="reply-form__box-03">
										<input class="reply-form__url" type="url" name="website" placeholder="Website">
									</div> -->
									<div class="reply-form__box-04">
										<textarea class="reply-form__message" name="message" cols="30" rows="10" placeholder="Message..."></textarea>
									</div>
                                    <input type="hidden" name="cid" value="<?php echo $idd; ?>">
									<div class="reply-form__box-05">
										<button class="btn-01" type="submit" name="pcom">Post comment</button>
									</div>
								</form>
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
	</div>

	<!-- JQuery v2.2.4 -->
	<script src="js/jquery-2.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="js/jquery.js"></script>

	<!-- Main script -->
	<script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>