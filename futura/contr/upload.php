<?php
include "db.php";
include "function.php";
$id = 1;//sesion id

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


if (isset($_POST['upload']))
{
    
        $title = mysqli_real_escape_string($con,$_POST['title']);
        $desc = mysqli_real_escape_string($con,$_POST['description']);
        $type = mysqli_real_escape_string($con,$_POST['type']);
         $subc = mysqli_real_escape_string($con,$_POST['subs']);
         $file = $_FILES["file"];
        $filename =  $_FILES["file"]["name"];
        
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    
        switch($type)
        {
               case "program":
                       $taken = array('txt','.C','.py');  
                        
            
                    break;
                     case "template":
                    $taken = array('zip');  
                   // array = ["txt"];
                    break;
                     case "video":
                $taken = array('mp4');  
                   // array = ["txt"];
                    break;
                     case "article":
                    $taken = array('txt','pdf');  
                   // array = ["txt"];
                    break;
                case "pic":
                         $taken = array('jpg','jpeg','png');  
                    
                      break;
                
                
        }
    
       if(!in_array($ext,$taken)){ 
         
           echo'<script> alert("file format not acceptable");window.location.assign("index.php");</script>';
                }else{
           
           //insert query into file detaiols
           
//           
//       if ($ext == "zip")
//           {
//               echo "okay". "   ". $ext; die();
//           }else
//       {
//           die();
//       }
//         
        $rann  = generateRandomString();
           $ran=$id.$rann.$ext;
                $filename =  $ran;
           
           
           //ran foramtb == userid_type_random.ext
           
                mysqli_query($con,"insert into upfiles(filename,userid,filetype,filelink,title,description,subscriber) values('$filename','1','$type','1','$title','$desc','$subc')");
           
            
            ///    move_uploaded_file($file["tmp_name"],"uploads/".$file["name"]);
                       move_uploaded_file($file["tmp_name"],"uploads/".$ran);
           
              echo'<script> alert("uploaded sucessfully");window.location.assign("index.php");</script>';
                }
        
    
}

?>

<!DOCTYPE html>
<html class="gr__livewp_site" lang="en">

<head>
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
									<input class="search-block__form-text" type="text" name="search-name"
										placeholder="Search...">
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



		<main class="content-row">
			<div class="content-box-01 single-team">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="single-team__info1">
								<form method="post" action="" enctype="multipart/form-data">
									<div class="form-group">
										<label>Title</label>
										<input type="text" name="title" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Content Description</label>
										<input type="text" name="description" class="form-control" required>
									</div>
									<label>category</label>
									<select class="reply-form__name" id="sub" name="type" onclick="hai()">
										<option value="program">Program Codes / Algorithms</option>
										<option value="template">Web Templates</option>
										<option value="video">Video</option>
										<option value="article">Article</option>
										<option value="pic">Photo</option>
									</select>
									<br><br>
									<label>Share With:</label>
									<select class="reply-form__name" name="subs">
										<option value="alpha">Alpha Subscribers</option>
										<option value="beta">Beta Subscribers</option>
										<option value="free">Free Subscribers</option>
									</select>
									<br><br>
									<p id="filearray"></p>
									<label> Upload File</label>
									<input class="btn-default" type="file" name="file">

									<div class="form-group">
										<br>
										<input type="submit" name="upload" class="btn-01" value="Upload">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>


		<script>
			// var array;

			function hai() {
				///var sub = sub.options[sub.selectedIndex];
				var sub = document.getElementById("sub").value;
				// console.log(sub);
				var txt;
				/// console.log( sub.value );
				//console.log( sub.text )





				switch (sub) {
					case "program":
						txt = "txt files are allowed";
						// array = ["txt"];
						break;
					case "template":
						txt = "zip files are allowed";
						// array = ["txt"];
						break;
					case "video":
						txt = "mp4 files are allowed";
						// array = ["txt"];
						break;
					case "article":
						txt = "txt , pdf files are allowed";
						// array = ["txt"];
						break;
					case "pic":
						txt = "jpg,jpeg files are allowed";
						//array = ["hai","hai"];
						break;

					default:
						txt = "Sorry Cant identify file";
				}
				//console.log(txt); 
				document.getElementById("filearray").innerHTML = txt;

				// document.getElementById("array").innerHTML = array;
				//    alert (array);
			}
		</script>


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



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span
		class="gr__triangle"></span></span>

</html>
