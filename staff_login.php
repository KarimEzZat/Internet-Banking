<?php
session_start();

if (isset($_SESSION['staff_login']))
    header('location:staff_homepage.php');
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
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-3">
                        <div class="user_login">
                            <form action='' method='POST'>
                                <span class="caption">تسجيل طاقم العمل</span>
                                <hr>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="name" placeholder="اسم الموظف" required="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="pwd" placeholder="كلمه المرور" required="">
                                </div>
                                <input type="submit" name="submitBtn" value="تسجيل" class="btn">
                            </form>

                        </div>
                        <?php
                        if (isset($_REQUEST['submitBtn'])) {
                            include '_inc/dbconn.php';
                            $username = $_REQUEST['name'];
                            $password = $_REQUEST['pwd'];

                            $sql = "SELECT name,pwd FROM staff WHERE name='$username' AND pwd='$password'";
                            $result = mysqli_query($con, $sql) or die(mysql_error());

                            if ((mysql_num_rows($result)) > 0) {
                                session_start();
                                $_SESSION['staff_login'] = $username;
                                $_SESSION['staff_id'] = $username;

                                header('location:staff_homepage.php');
                            } else {
                                echo "خطا في كلمه السر او اسم المستخدم";
                            }
                        }
                        ?>
                    </div>

                    <div class="col-md-9">
                        <img src="images/staff.png" >
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php';
        ?>
