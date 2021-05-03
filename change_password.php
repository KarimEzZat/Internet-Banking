<?php
session_start();
include '_inc/dbconn.php';

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
            <div class='content'>
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-4 offset-md-2">
                            <?php include 'admin_navbar.php' ?>
                        </div>
                        <div class="col-md-6">
                            <div class='admin_change_pwd'>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="كلمه السر القديمه" type="password" name="old_password" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="كلمه السر الجديده" type="password" name="new_password" required=""/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="كلمه السر الجديده" type="password" name="again_password" required=""/>
                                    </div>
                          
                                    <input  type="submit" name="change_password" value="تغيير" class="btn"/>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <?php
        if (isset($_REQUEST['change_password'])) {
            $sql = "SELECT * FROM admin WHERE id='1'";
            $result = mysqli_query($con, $sql);
            $rws = mysqli_fetch_array($result);
            $old = ($_REQUEST['old_password']);
            $new = ($_REQUEST['new_password']);
            $again = ($_REQUEST['again_password']);
            if ($rws[9] == $old && $new == $again) {
                $sql1 = "UPDATE admin SET pwd='$new' WHERE id='1'";
                mysqli_query($con, $sql1) or die(mysql_error());
                header('location:admin_hompage.php');
            } else {

                header('location:change_password.php');
            }
        }
        ?>


        <?php include 'footer.php'; ?>