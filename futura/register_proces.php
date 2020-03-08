<?php 
include "db.php";
include "function.php"; 
?>

<?php  
    
    
if(isset($_POST['submit'])){

       if ( empty($_POST['name']) || empty($_POST['mobile']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['re_password']) )
    {
             echo "<script>alert('SORRY ALL FILEDS REQUIRED');window.location.assign('login.php'); </script>";
    }
    elseif( $_POST['password'] != $_POST['re_password'] )
    {      echo "<script>alert('Password should be same');window.location.assign('login.php'); </script>";
    }
    else
    {
        
        
        $name = mysqli_real_escape_string($con,$_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
           $password = encryptPassword($password);
        $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
        
                $type = mysqli_real_escape_string($con, $_POST['type']);
        $typea = mysqli_real_escape_string($con, $_POST['typea']);
         $quali = mysqli_real_escape_string($con, $_POST['quali']);

        
       $query1 = "select * from user where email = '$email' ";
       $result1 = mysqli_query($con,$query1); 
       
         if (mysqli_num_rows($result1) > 0)
         {   echo "<script>alert('Sorry Email already used');window.location.assign('login.php'); </script>";
        }else{
             date_default_timezone_set("Asia/Kolkata");
             $date =date('Y:m:d H:i:s');
             if ($type == "educator")
             {
   //  echo $typea; die();
                 $sql =  mysqli_query($con,"INSERT INTO user(username,email,password,phno,subpkg,quali,iscontri,subdate) VALUE('$name','$email','$password','$mobile','free','$quali','$typea','$date')");
                 if ($sql)
                 {
                     
             $ssql =mysqli_fetch_array(mysqli_query($con,"select * from user where email like '$email'")) ;                       
                     session_start();
                          $_SESSION['bizid'] = $ssql['id'];
                     $_SESSION['name'] = $name;
                     
                header("location:index.php");
                 }else{
                     
                       echo "<script>alert('Sorry An error occured');window.location.assign('login.php'); </script>";
                     
                 }
                 
             }
             
             else
             {
            //   echo $typea; die();
                     $sql =  mysqli_query($con,"INSERT INTO user(username,email,password,phno,subpkg,quali,iscontri,subdate) VALUE('$name','$email','$password','$mobile','$typea','$quali','0','$date')");
                 if ($sql)
                 {
                            
             $ssql =mysqli_fetch_array(mysqli_query($con,"select * from user where email like '$email'")) ;                       
                     session_start();
                          $_SESSION['bizid'] = $ssql['id'];
                     $_SESSION['name'] = $name;
                    header("location:index.php");
                 }else{
                     
                       echo "<script>alert('Sorry An error occured');window.location.assign('login.php'); </script>";
                     
                 }
             }
             
             
        $sql = "INSERT INTO user(cname,cmail,cpass,cphno) VALUE('$name','$email','$password','$mobile')";
      $result= mysqli_query($con,$sql);
      if($result){
        $msg="<div class='alert alert-success'>Successfully Regeistered</div>";
        echo $msg;   
      }
    else{

    $msg="<div class='alert alert-danger'>FAILED!</div>";
        echo $msg;  
} }
    
}}
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
							<!-- <div class="search-block">
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
									<a href="courseexplore.php" >Events</a>

								</li>
								
								<li>
									<a href="courses.php">Courses</a>
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
                   <div class="register-form">
                       <h2>Register</h2>
                       <form action="register_proces.php" method="post">
                           <div class="group-input">
                               <label for="username">Name*</label>
                               <input type="text"  name="name" id="name" required>
                           </div> 
                           <div class="group-input">
                               <label for="phoneno">Phone Number*</label>
                               <input type="text"  name="mobile" id="mobile" required>
                           </div>
                           <div class="group-input">   
                               <label for="email">E-mail id</label>
                               <input type="text" name="email" id="email" required>
                               <!-- <label for="username">Username or email address *</label>
                               <input type="text" id="username"> -->
                           </div>
                           <div class="group-input">
                               <label>Qualification</label>
                               <input type="text"  name="quali" required>
                           </div>
                      
                           
                           
                           <div class="group-input" >
                                    
                           <label>Create account as</label>

                           <select name="type" class="reply-form__name" >
                           <option value="educator">Educator</option>
                           <option value="learner">Learner</option>
                           </select>
          
                           </div>
                           
                           
                           
                        <div class="group-input" >
                                    
                           <label>Account Type</label>

                           <select class="reply-form__name" name="typea" >
                           <option value="free">Free</option>
                           <option value="alpha">Alpha</option>
                         <option value="beta">Beta</option>
                           </select>
          
                           </div>
                           
                                <div class="group-input">
                               <label for="pass">Password *</label>
                               <input type="password" name="password" id="password" required>
                           </div>
                           <div class="group-input">
                               <label for="re_password">Confirm Password *</label>
                               <input type="password"  name="re_password" id="re_password" required>
                           </div>
                           
                   
                           <button type="submit" name="submit" value=" Submit" class="btn-01">REGISTER & SUBSCRIBE </button>
                       </form>
                       <div class="switch-login">
                           <a href="login.php" class="or-login">Or Login</a>
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

	<!-- JQuery v2.2.4 -->
	<script src="js/jquery-2.js"></script>

	<!-- Superfish v1.7.9 -->
	<script src="js/jquery.js"></script>

	<!-- Main script -->
	<script src="js/main.js"></script>



</body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
