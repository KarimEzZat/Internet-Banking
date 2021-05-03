<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php
include '_inc/dbconn.php';
$name=  ($_REQUEST['staff_name']);
$gender=  ($_REQUEST['staff_gender']);
$dob=  ($_REQUEST['staff_dob']);
$status=  ($_REQUEST['staff_status']);
$dept=  ($_REQUEST['staff_dept']);
$doj=  ($_REQUEST['staff_doj']);
$address=  ($_REQUEST['staff_address']);
$mobile=  ($_REQUEST['staff_mobile']);
$email= ($_REQUEST['staff_email']);
$password=  ($_REQUEST['staff_pwd']);

$sql="insert into staff values('','$name','$dob','$status','$dept','$doj','$address','$mobile',
    '$email','$password','$gender','')";
mysqli_query($con, $sql) or die("the email-id is already registered");
header('location:admin_hompage.php');
?>