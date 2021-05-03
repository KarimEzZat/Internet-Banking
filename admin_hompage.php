<?php
session_start();

if (!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>

<!DOCTYPE html>
<html>
    <head>


        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="UTF-8">
        <title>النظام المصرفي عبر الإنترنت
        </title>
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-rtl.css">

        <link rel="stylesheet" href="css/newcss.css">
        <link rel="stylesheet" href="css/cssanimation.min.css" >



    </head>
    <body>

        <section class="admin-box">
            <div class="container">
            <div class="row">
    <div class="col-md-4">
        <?php include 'admin_navbar.php' ?>
        
        
    </div>
                <div class="col-md-4">
                    <div class='admin_staff'>

            <ul>
                <li><h4 class="text-center">الموظفون</h4></li>
                <li> <a href="addstaff.php">اضافه موظف</a></li>
                <li><a href="display_staff.php">تعديل الموظف</a></li>
                <li> <a href="delete_staff.php">رفد الموظف</a></li>
            </ul>
        </div>
                </div>
                
                <div class="col-md-4">
                    <div class='admin_customer'>
            <ul>
                <li><h4 class="text-center"> العملاء</h4></li>
                <li><a href="addcustomer.php">اضافه عميل</a></li>
                <li> <a href="display_customer.php">تعديل العميل</a></li>
                <li> <a href="delete_customer.php">حذف العميل</a></li>
        </div>
                </div>
</div>
        </div>
        </section>
        <?php include 'footer.php'; ?>