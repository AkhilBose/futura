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
     echo $typea; die();
                 $sql =  mysqli_query($con,"INSERT INTO user(username,email,password,phno,subpkg,quali,iscontri,subdate) VALUE('$name','$email','$password','$mobile','freeeee','$quali','$typea','$date')");
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
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRISM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
        <!-- Header Section Begin -->
        <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        contact@prism.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +91 9876543210
                    </div>
                </div>
                <div class="ht-right">
                    <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">Malayalam </option>
                        </select>
                    </div>
                    <!-- <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-lg-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action="#" class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-lg-3">
                        <ul class="nav-right">
                            <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon"><a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span>3</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">Rs 870.00</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
               
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./shop.html">Locate</a></li>
                        <li><a href="ppro-list.php">Pricing</a>
                            <!-- <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul> -->
                        </li>
                        <li><a href="./blog.html">Announcement</a></li>
                        <li><a href="./contact.html">Contact</a></li>
                        <li><a  href="user.php">User profile</a>
                            <!-- <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->

    
    <div class="register-login-section spad">
       
        <div class="container">
          

            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="register_process.php" method="post">
                            <div class="group-input">
                                <label for="username">Name*</label>
                                <input type="text"  name="name" id="name" required>
                            </div> 
                            <div class="group-input">
                                <label for="phoneno">Phone Number*</label>
                                <input type="number"  name="mobile" id="mobile" required>
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

                            <select name="type" >
                            <option value="educator">Educator</option>
                            <option value="learner">Learner</option>
                            </select>
           
                            </div>
                            
                            
                            
                         <div class="group-input" >
                                     
                            <label>Account Type</label>

                            <select name="typea" >
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
                            
                    
                            <button type="submit" name="submit" value=" Submit" class="site-btn register-btn">REGISTER </button>
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
    
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <!-- <img src="img/logo-carousel/logo-1.png" alt=""> -->
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <!-- <img src="img/logo-carousel/logo-2.png" alt=""> -->
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <!-- <img src="img/logo-carousel/logo-3.png" alt=""> -->
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                      
                     -->
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <!-- <img src="img/logo-carousel/logo-5.png" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello.colorlib@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
               
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <!-- </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>-->
            </div>
        </div>  
    </footer>
    <!-- Footer Section End -->

    
    <script>
        
        
        
        
    </script>
    
    
    
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>

