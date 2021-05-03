<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
    <?php
include '_inc/dbconn.php';
$name=  $_REQUEST['customer_name'];
$gender=  $_REQUEST['customer_gender'];
$dob=  $_REQUEST['customer_dob'];
$nominee= $_REQUEST['customer_nominee'];
$type=  $_REQUEST['customer_account'];
$credit=  $_REQUEST['initial'];
$address=  $_REQUEST['customer_address'];
$mobile=  $_REQUEST['customer_mobile'];
$email= $_REQUEST['customer_email'];

$password= $_REQUEST['customer_pwd'];

$branch=  $_REQUEST['branch'];
$date=date("Y-m-d");
switch($branch){
case 'القاهره': $ifsc="C334A";
    break;
case 'المنصوره': $ifsc="M30AC";
    break;
case 'نبروه': $ifsc="N6A9E";
    break;
}

$sql3="SELECT MAX(id) from customer";
$result=mysqli_query($con, $sql3);
$rws=  mysqli_fetch_array($result);
$id=$rws[0]+1;
$sql1="CREATE TABLE passbook".$id." 
    (transactionid int(5) AUTO_INCREMENT, transactiondate date, name VARCHAR(255), branch VARCHAR(255), ifsc VARCHAR(255), credit int(10), debit int(10), 
    amount float(10,2), narration VARCHAR(255), PRIMARY KEY (transactionid))";

$sql="insert into customer values('','$name','$gender','$dob','$nominee','$type','$address','$mobile',
    '$email','$password','$branch','$ifsc','','ACTIVE')";
mysqli_query($con, $sql) or die("Email already exists!");
mysqli_query($con, $sql1);
$sql4="insert into passbook".$id." values('','$date','$name','$branch','$ifsc','$credit','0','$credit','Account Open')";
mysqli_query($con, $sql4);
header('location:admin_hompage.php');
?>