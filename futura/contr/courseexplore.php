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

$flagg=0;


if (isset($_POST['search']))
{
    
    $fcon =mysqli_real_escape_string($con,$_POST['searchtxt']);
    
    $query = mysqli_query($con,"select * from upfiles where filetype like '$fcon'");
    $flagg =1;
}




if (isset($_POST['subfil']))
{
    
    $fcon =mysqli_real_escape_string($con,$_POST['filter']);
    
    $query = mysqli_query($con,"select * from upfiles where filetype like '$fcon'");
    $flagg =1;
}




?>
<!DOCTYPE html>
<html class="gr__livewp_site" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Course Explorer</title>
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
                                <!-- <li>
                                    <a href="index.php">Home</a>
                                </li> -->


                                <li>
									<a href="upload.php">Upload</a>
								</li>
								<li>
                                    <a href="courseexplore.php">View Posts</a>

                                </li>
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
            <div class="page-title-wrapp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-title-01">View Posts</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumbs">
                                <li class="active">
                                    <a href="index.php">Home</a>
                                </li>
                                <li>Courses</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box padding-top-20 padding-bottom-36">
                <div class="container">
                    <div class="row sort-group filter-button-group">
                        <div class="col-lg-12">
                        <form method="post" action="">
						<label>Filter</label>
						<select class="reply-form__name" name="filter">
							<option value="program">Program Codes / Algorithms</option>
							<option value="template">Web Templates</option>
							<option value="video">Video</option>
							<option value="article">Article</option>
							<option value="pic">Photo</option>
						</select>

						<input class="btn-01" type="submit" value="FILTER" name="subfil">

					</form>
                        </div>
                    </div>
                    <?php
                    if($flagg == 0){
                    
                    ?>

                    <div class="related-products spad">
                        <div class="container">
                            <div class="row">
                                    <?php 

                                    $query1 = mysqli_query($con,"select * from upfiles");
                                    while($row = mysqli_fetch_array($query1))
                                    {

                                    ?>
                                <div class="col-lg-3 col-sm-6">
                                <div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-01.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<p class="product-list__category"><?php  echo $row['filetype']; ?></p>
									<h3 class="product-list__title">
										<p><?php echo $row['title']; ?></p>
									</h3>
                                    
<!--
                                    
									<ul class="product-list__star-list">
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
                                    	
                                <a href="">
									<p class="product-list__price">download file</p>
								</a>
									
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">14 Lessons</p>
									<p class="item-info__text-02">25 Seats</p>

							
                                </div>

								<form action="course.php" method="post">
									<input type="hidden" name="idd" value="<?php echo $row['id']; ?>">
									<input type="submit" value="View Course" name="viewcourse" class="btn btn-primary">

								</form>
								
							</div>
                            </div>
                            <?php
                    }
                        ?>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    else
                    {
                        ?>
                    <div class="related-products spad">
                        <div class="container">
                            <div class="row">
                            <?php 
                       if (mysqli_num_rows($query) == 0)
                       {
                           echo "<h2>No Data Available<h2>";
                       }
                    while($row = mysqli_fetch_array($query))
                    {
                   
                    ?>
                                <div class="col-lg-3 col-sm-6">
                                <div class="product-list__item">
								<figure class="product-list__img">
									<a href="course.php">
										<img src="img/product_img-01.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<p class="product-list__category"><?php  echo $row['filetype']; ?></p>
									<h3 class="product-list__title">
										<p><?php echo $row['title']; ?></p>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price"> 150</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">14 Lessons</p>
									<p class="item-info__text-02">25 Seats</p>
								</div>

								<form action="course.php" method="post">
									<input type="hidden" name="idd" value="<?php echo $row['id']; ?>">
									<input type="submit" value="View Course" name="viewcourse" class="btn-01">
								</form>
								<a href="">
									<p class="item-info__text-02">download</p>
								</a>
							</div>
						</div>
                        <?php
                    }
                        ?>
						</div>
						</div>
						</div>
                        <?php
                    }
                        ?>
                    <!-- 	<div class="row grid" style="position: relative; height: 842.334px;">
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 languages mathematics biology" style="position: absolute; left: 292px; top: 0px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-02.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Biology</a>
									<h3 class="product-list__title">
										<a href="single_course.php">Anatomy Course</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 90</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">10 Lessons</p>
									<p class="item-info__text-02">14 Seats</p>
								</div>
							</div>
						</div>


						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 design history economy" style="position: absolute; left: 585px; top: 0px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-03.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Mathematics</a>
									<h3 class="product-list__title">
										<a href="single_course.php">Geometry Course</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 180</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">21 Lessons</p>
									<p class="item-info__text-02">56 Seats</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 biology languages" style="position: absolute; left: 877px; top: 0px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-04.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Design</a>
									<h3 class="product-list__title">
										<a href="single_course.php">Interior Design</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 210</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">17 Lessons</p>
									<p class="item-info__text-02">15 Seats</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 history economy design" style="position: absolute; left: 0px; top: 421px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-05.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">History</a>
									<h3 class="product-list__title">
										<a href="single_course.php">World History</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 70</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">23 Lessons</p>
									<p class="item-info__text-02">36 Seats</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 mathematics biology" style="position: absolute; left: 292px; top: 421px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-06.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Design</a>
									<h3 class="product-list__title">
										<a href="single_course.php">Graphic Design</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 250</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">50 Lessons</p>
									<p class="item-info__text-02">25 Seats</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 economy mathematics economy technologies" style="position: absolute; left: 585px; top: 421px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-07.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Technology</a>
									<h3 class="product-list__title">
										<a href="single_course.php">Word Press</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 180</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">21 Lessons</p>
									<p class="item-info__text-02">56 Seats</p>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 design technologies history" style="position: absolute; left: 877px; top: 421px;">
							<div class="product-list__item">
								<figure class="product-list__img">
									<a href="single_course.php">
										<img src="img/product_img-08.jpg" alt="">
									</a>
								</figure>
								<div class="product-list__content">
									<a class="product-list__category" href="#">Languages</a>
									<h3 class="product-list__title">
										<a href="single_course.php">English Basic</a>
									</h3>
									<ul class="product-list__star-list">
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
									<p class="product-list__price">$ 115</p>
								</div>
								<div class="product-list__item-info">
									<p class="item-info__text-01">35 Lessons</p>
									<p class="item-info__text-02">47 Seats</p>
								</div>
							</div>
						</div> -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="courses-pagination">
                            <ul class="pagination-list">
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">next</a>
                                </li>
                            </ul>
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
    <script src="js/jquery_002.js"></script>

    <!-- Isotope v3.0.4 -->
    <script src="js/jquery.js"></script>

    <!-- Main script -->
    <script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span
        class="gr__triangle"></span></span>

</html>