<?php 
session_start();
        
if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<?php
if(isset($_REQUEST['submit_id']))
{
    include '_inc/dbconn.php';
    $id=$_REQUEST['customer_id'];
    
    $sql="SELECT * FROM book_appointment WHERE id='$id'";
    $result=  mysqli_query($con, $sql) or die(mysql_error());
    $rws=  mysqli_fetch_array($result);
                
    if($rws['book_appoint_status']=="PENDING")
    $sql="UPDATE book_appointment SET book_appoint_status='ISSUED' WHERE id='$id'";
    
    mysqli_query($con, $sql) or die(mysql_error());
    
   echo '<script>alert("تم تفعيل الموعد");window.location= "staff_book_approve.php";</script>';
}