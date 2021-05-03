<?php
session_start();

if (!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<?php
include '_inc/dbconn.php';
$id = ($_REQUEST['staff_id']);
$sql = "SELECT * FROM `staff` WHERE id=$id";
$result = mysqli_query($con, $sql) or die(mysql_error());
$rws = mysqli_fetch_array($result);
?>
<?php
$delete_id = ($_REQUEST['staff_id']);
if (isset($_REQUEST['submit2_id'])) {
    $sql_delete = "DELETE FROM `staff` WHERE `id` = '$delete_id'";
    mysqli_query($con, $sql_delete) or die(mysql_error());
    header('location:delete_staff.php');
}
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
                    <div class="col-md-3 offset-md-2">
                        <?php include 'admin_navbar.php' ?>
                    </div>
                    <div class="col-md-7">
                        <form action="alter_staff.php" method="POST">
                            <table align="center" >
                                <input type="hidden" name="current_id" value="<?php echo $id; ?>"/>
                                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3>تعديل بيانات الموظف</h3></td></tr>
                                <tr>
                                    <td>اسم المــوظــف</td>
                                    <td><input class="form-control" type="text" name="edit_name" value="<?php echo $rws[1]; ?>" required=""/></td>
                                </tr>
                                <tr>
                                    <td>الجــنس</td>
                                    <td>
                                        ذكـــر<input type="radio" name="edit_gender" value="M" <?php if ($rws[10] == "M") echo "checked"; ?>/>
                                        أنثــــي<input type="radio" name="edit_gender" value="F" <?php if ($rws[10] == "F") echo "checked"; ?>/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        تــاريخ الميـــلاد
                                    </td>
                                    <td>
                                        <input class="form-control" type="date" name="edit_dob" value="<?php echo $rws[2]; ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>الحــالة الاجتمـــاعية</td>
                                    <td>
                                        <select class="form-control" name="edit_status">
                                            <option <?php if ($rws[3] == "unmarried") echo "selected"; ?>>اعـــزب</option>
                                            <option <?php if ($rws[3] == "married") echo "selected"; ?>>متـــزوج</option>
                                            <option <?php if ($rws[3] == "divorced") echo "selected"; ?>>مطـــلق</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>القســــــم</td>
                                    <td>
                                        <select class="form-control" name="edit_dept">
                                            <option <?php if ($rws[4] == "revenue") echo "selected"; ?>>قســـم الايرادات</option>
                                            <option <?php if ($rws[4] == "developer") echo "selected"; ?>>قســـم التطويـــر</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        تـــاريخ الانضمام الي العمل
                                    </td>
                                    <td>
                                        <input class="form-control" type="date" name="edit_doj" value="<?php echo $rws[5]; ?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td>العنـــوان</td>
                                    <td><textarea class="form-control" name="edit_address"><?php echo $rws[6]; ?></textarea></td>
                                </tr>

                                <td>موبـــايل</td>
                                <td><input class="form-control" type="text" name="edit_mobile" value="<?php echo $rws[7]; ?>" required=""/></td>
                                </tr>

                                <tr>
                                    <td>رقم الايميل</td>
                                    <td><input class="form-control" type="text" name="edit_mobile" value="<?php echo $rws[8]; ?>" required=""/></td>
                                </tr>

                                <tr>
                                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter" value="تعديل البيــانات" class='btn'/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                        


                    </div>

        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>
