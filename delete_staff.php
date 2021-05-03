<?php
session_start();

if (!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<!DOCTYPE html>
<?php
include '_inc/dbconn.php';
$sql = "SELECT * FROM `staff`";
$result = mysqli_query($con, $sql);
$sql_min = "SELECT MIN(id) from staff";
$result_min = mysqli_query($con, $sql_min);
$rws_min = mysqli_fetch_array($result_min);
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
            <div class='container'>
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-3">
                        <?php include 'admin_navbar.php' ?>
                    </div>
                    <div class="col-md-9">
                        <form action="editstaff.php" method="POST">
                            <h3 class="text-center" style='color:#2E4372;margin-bottom: 30px'>بيـــانات الموظفين</h3>
                            <table class="table" style="margin-bottom: 20px" align="center">

                                <th>id</th>
                                <th>الاسم</th>
                                <th>الجنس</th>
                                <th>تاريخ الميلاد</th>
                                <th>الحاله الاجتماعيه</th>
                                <th>القسم</th>
                                <th>تاريخ العمل</th>
                                <th>العنوان</th>
                                <th>موبايل</th>
                                <th>ايميل</th>
                                <?php
                                while ($rws = mysqli_fetch_array($result)) {
                                    echo "<tr><td><input type='radio' name='staff_id' value=" . $rws[0];
                                    if ($rws[0] == $rws_min[0])
                                        echo' checked';
                                    echo " /></td>";
                                    echo "<td>" . $rws[1] . "</td>";
                                    echo "<td>" . $rws[10] . "</td>";
                                    echo "<td>" . $rws[2] . "</td>";
                                    echo "<td>" . $rws[3] . "</td>";
                                    echo "<td>" . $rws[4] . "</td>";
                                    echo "<td>" . $rws[5] . "</td>";
                                    echo "<td>" . $rws[6] . "</td>";
                                    echo "<td>" . $rws[7] . "</td>";
                                    echo "<td>" . $rws[8] . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>



                                    <input type="submit" name="submit2_id" value="حـــذف" class='btn' >
                        </form>
                    </div>
                </div>




            </div>
        </section>

        <?php include 'footer.php'; ?>
    </body>
</html>