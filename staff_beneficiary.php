<?php
session_start();

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
                        <h3 style="text-align:center;color:#2E4372; margin-bottom: 20px">طلبات المستفيد
                        </h3>
                        <?php
                        include '_inc/dbconn.php';
                        $sql = "SELECT * FROM beneficiary1 WHERE status='PENDING'";
                        $result = mysqli_query($con, $sql) or die(mysql_error());
                        ?>

                        <form action="staff_approve_beneficiery.php" method="POST">
                            <table class="table" style="margin-bottom: 20px" align="center">
                                <th>id</th>
                                <th>المرسل</th>
                                <th>رقم حساب المرسل</th>
                                <th>المستقبل</th>
                                <th>رقم حساب المستقبل</th>
                                <th>الحاله</th>



                                <?php
                                while ($rws = mysqli_fetch_array($result)) {
                                    echo "<tr><td><input type='radio' name='customer_id' value=" . $rws[0];
                                    echo ' checked';
                                    echo " /></td>";
                                    echo "<td>" . $rws[2] . "</td>";
                                    echo "<td>" . $rws[1] . "</td>";
                                    echo "<td>" . $rws[4] . "</td>";
                                    echo "<td>" . $rws[3] . "</td>";
                                    echo "<td>" . $rws[5] . "</td>";

                                    echo "</tr>";
                                }
                                ?>
                            </table>
                            <input type="submit" name="submit_id" value="تاكيد" class='btn'/>
                        </form>
                    </div>
                </div>



            </div>
        </section>
        <?php include 'footer.php' ?>
    </body>
</html>




