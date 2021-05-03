<?php
session_start();
include '_inc/dbconn.php';

if (!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
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

                    <div class="col-md-3 offset-md-2">
                        <?php include 'staff_navbar.php' ?>
                    </div>
                    <div class="col-md-7">
                        <h3 style="text-align:center;color:#2E4372;">تغيير كلمه المرور</h3>
                        <form action="" method="POST">
                                
                                    
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="كلمه المرور القديمه" name="old_password" required=""/>
                            </div>
                                
                            <div class="form-group">
                                <input class="form-control" type="password" placeholder="كلمه المرور الجديده" name="new_password" required=""/>
                            </div>
                             <div class="form-group">
                                <input class="form-control" placeholder="كلمه المرور الجديده" type="password" name="again_password" required=""/>
                            </div>
                   

                           <input type="submit" name="change_password" value="تغيير" class='btn'/>
                                
                            
                        </form>
                        <?php
                        $user = $_SESSION['login_id'];
                        if (isset($_REQUEST['change_password'])) {
                            $sql = "SELECT * FROM staff WHERE email='$user'";
                            $result = mysqli_query($con, $sql);
                            $rws = mysqli_fetch_array($result);
                            $old = ($_REQUEST['old_password']);
                            $new = ($_REQUEST['new_password']);
                            $again = ($_REQUEST['again_password']);
                            if ($rws[9] == $old && $new == $again) {
                                $sql1 = "UPDATE staff SET pwd='$new' WHERE email='$user'";
                                mysqli_query($con, $sql1) or die(mysql_error());
                                header('location:staff_homepage.php');
                            } else {
                                /* RASHID give the pop up window about something went wrong try again */
                                header('location:change_password_staff.php');
                            }
                        }
                        ?>
                    </div>
                </div>



            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>