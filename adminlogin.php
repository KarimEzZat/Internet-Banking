<?php
session_start();

if (isset($_SESSION['admin_login']))
    header('location:admin_homepage.php');
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
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <div class="user_login">
                            <form action='' method='POST'>
                                <span class="caption">تسجبل دخول المسئول</span>
                                <hr>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="uname" required placeholder="اسم المدير">
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  type="password" name="pwd" required placeholder="كلمه المرور">
                                </div>
                                <input type="submit" name="submitBtn" value="دخول" class="btn" >
                            </form>


                        </div>
                    </div>
                    <div class="col-md-9">
                        <img src="images/admin.png" >
                    </div>

                    <?php
                    include '_inc/dbconn.php';
                    if (!isset($_SESSION['admin_login'])) {
                        if (isset($_REQUEST['submitBtn'])) {
                            $username = $_REQUEST['uname'];
                            $password = $_REQUEST['pwd'];
                        
                            $sql = "SELECT * FROM admin WHERE name='$username' AND pwd='$password'";
                            $result = mysqli_query($con, $sql);


                            if ((mysqli_num_rows($result)) > 0) {

                                $_SESSION['admin_login'] = $username;
                                header('location:admin_hompage.php');
                            } else
                                echo '<p>خطا في كلمه السر او اسم المستخدم</p>';
                        }
                    }
                    else {
                        header('location:admin_hompage.php');
                        echo 'Error';
                    }
                    ?>
                </div>

            </div>
        </section>

        <?php include 'footer.php'; ?>
