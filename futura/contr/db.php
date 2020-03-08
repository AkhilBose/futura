<?php
global $con;
//$con = mysqli_connect('ktuguru.com','sobincee_panda','goldenpanda','sobincee_goldenpanda');

$con = mysqli_connect('localhost','root','','tkm');

if(!$con)
{
    echo 'Sorry cannot connect to database'.mysqli_error($con);
}


/*global $con;
$con = mysqli_connect('localhost','root','','mlm');

if(!$con)
{
    echo 'Sorry cannot connect to database'.mysqli_error($con);
}*/


?>