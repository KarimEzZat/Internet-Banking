<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
include '_inc/dbconn.php';
$name=$_SESSION['name'];
$account_no=$_SESSION['login_id'];
$appointment=$_REQUEST['book'];
$sql="insert into  book_appointment values('','$name','$account_no','PENDING','$appointment')";
mysqli_query($con, $sql) or die(mysql_error());

echo '<script>alert("طلبك قيد التنفيذ يرجي انتظار المراجعه");window.location= "customer_book_appointment.php";</script>';
?>