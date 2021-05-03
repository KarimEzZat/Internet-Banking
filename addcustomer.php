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
                    <div class="col-md-3 offs-md-2">
                        <?php include 'admin_navbar.php' ?>
                    </div>
                    <div class="col-md-7">

                        <form action="add_customer.php" method="POST">
                            <table class="table" align="center">
                                <tr><td colspan='2' align='center' style='color:#2E4372;'><h3>اضافه عميل</h3></td></tr>
                                <tr>
                                    <td> اسم العميل</td>
                                    <td><input class="form-control" type="text" name="customer_name" required=""/></td>
                                </tr>
                                <tr>
                                    <td>الجــنس</td>
                                    <td>
                                        ذكــــر<input type="radio" name="customer_gender" value="ذكر" checked/>
                                        أنثــــي<input type="radio" name="customer_gender" value="أنثي" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        تاريخ الميلاد
                                    </td>
                                    <td>
                                        <input class="form-control" type="date" name="customer_dob" required=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>المرشح</td>
                                    <td><input class="form-control" type="text" name="customer_nominee" required=""/></td>
                                </tr>
                                <tr>
                                    <td>
                                        الفرع
                                    </td>
                                    <td>
                                        <select class="form-control" name="branch">
                                        <option value='cairo'>القاهره</option>
                                <option value='mansoura'>المنصوره</option>
                                <option value='nabrouh'>نبروه</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>نوع الحساب</td>
                                    <td>
                                        <select class="form-control" name="customer_account">
                                            <option value="savings">ادخاري</option>
                                            <option value="current">جاري</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>الحد الأدنى للمبلغ
                                    </td>
                                    <td><input class="form-control" type="text" name="initial" value="1000" min="1000" required=""/></td>
                                </tr>

                                <tr>
                                    <td>العنوان:</td>
                                    <td><textarea class="form-control" name="customer_address" required=""></textarea></td>
                                </tr>
                                <tr>
                                    <td>موبايل</td>
                                    <td><input class="form-control" type="text" name="customer_mobile" required=""/></td>
                                </tr>

                                <tr>
                                    <td>رقم الايميل</td>
                                    <td><input class="form-control" type="email" name="customer_email" required=""/></td>
                                </tr>
                                <tr>
                                    <td>كلمه المرور</td>
                                    <td><input class="form-control" type="password" name="customer_pwd" required=""/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="add_customer" value="اضافه عميل" class="btn"/></td>
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