<?php
session_start();

if (!isset($_SESSION['admin_login']))
    header('location:adminlogin.php');
?>
<?php
include '_inc/dbconn.php';
$id = ($_REQUEST['customer_id']);
$sql = "SELECT * FROM `customer` WHERE id=$id";
$result = mysqli_query($con, $sql) or die(mysql_error());
$rws = mysqli_fetch_array($result);
?>
<?php
$delete_id = ($_REQUEST['customer_id']);
if (isset($_REQUEST['submit2_id'])) {
    $sql_delete = "DELETE FROM `customer` WHERE `id` = '$delete_id'";
    $sql_drop = "DROP TABLE passbook" . $delete_id;
    mysqli_query($con, $sql_delete) or die(mysql_error());
    mysqli_query($con, $sql_drop) or die(mysql_error());
    header('location:delete_customer.php');
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
                    <div class="col-md-3 oofset-md-2">
                        <?php include 'admin_navbar.php' ?>
                    </div>
                    <div class="col-md-7">
                        <form action="alter_customer.php" method="POST">
                            <input type="hidden" name="current_id" value="<?php echo $id; ?>"/>
                            <h3 class="text-center" style='color:#2E4372; margin-bottom: 30px' >تعديــل بيـــانــات العميل</h3>

                            <div class="form-group">
                                <label>اسم العميل</label>
                                <input class="form-control" type="text" name="edit_name" value="<?php echo $rws[1]; ?>" required=""/>
                            </div>
                            
                            <div class="form-group">
                                <label>الجنس</label><br>
                                ذكـــر<input type="radio" name="edit_gender" value="M" <?php if ($rws[2] == "M") echo "checked"; ?>/>
                                أنثـــي<input type="radio" name="edit_gender" value="F" <?php if ($rws[2] == "F") echo "checked"; ?>/>
                            </div>
                            <div class="form-group">
                                <label>تــاريخ الميـــلاد</label>
                                <input class="form-control" type="date" name="edit_dob" value="<?php echo $rws[3]; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>المرشــح</label>
                                <input class="form-control" type="text" name="edit_nominee" value="<?php echo $rws[4]; ?>" required=""/>
                            </div>
                            
                            <div class="form-group">
                                <label>نوع الحساب</label>
                                 <select class="form-control" name="edit_account">
                                    <option <?php if ($rws[5] == "savings") echo "selected"; ?>>ادخاري</option>
                                    <option <?php if ($rws[5] == "current") echo "selected"; ?>>جاري</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>العنوان</label>
                                 <textarea class="form-control" name="edit_address"><?php echo $rws[6]; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>الموبايل</label>
                                <input class="form-control" type="text" name="edit_mobile" value="<?php echo $rws[7]; ?>" required=""/>
                            </div>
                            <div class="form-group">
                                <label>الايميل</label>
                                <input class="form-control" type="text" name="edit_email" value="<?php echo $rws[8]; ?>" required=""/>
                            </div>



                                



                            <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter_customer" value="تعديل البيانات" class='btn'/>

                        </form>
                    </div>
                </div>



            </div>
        </section>
        <?php include 'footer.php' ?>

    </body>
</html>
