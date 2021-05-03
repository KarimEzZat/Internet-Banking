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
            <div class='container'>
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4 offset-md-2">
                        <?php include 'admin_navbar.php' ?>
                    </div>
                    <div class="col-md-6">
                        <div class='addstaff'>
                            <form action="add_staff.php" method="POST">
                                <h3 style="margin-bottom: 30px" class="text-center">اضافه موظف</h3>

                                <div class="form-group">
                                    <input class="form-control" type="text" name="staff_name" required="" placeholder="اسم الموظف"/>
                                </div>

                                <div class="form-group">
                                    <label>الجنس</label>
                                    ذكر<input type="radio" name="staff_gender" value="male" checked/>
                                    انثي<input type="radio" name="staff_gender" value="femal" />
                                </div>
                                <div class="form-group">
                                    <label>تاريخ الميلاد</label>
                                    <input class="form-control" type="date" name="staff_dob" required="" placeholder=""/>
                                </div>


                                <div class="form-group">
                                    <label>الحاله الاجتماعيه</label>
                                    <select name="staff_status">
                                        <option value="single"> اعزب</option>
                                        <option value="married">متزوج</option>
                                        <option value="divorced">مطلق</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>القسم</label>
                                    <select name="staff_dept">
                                        <option value="revenues">الايرادات</option>
                                        <option value="development">التطوير</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>تالايخ الانضمام الي العمل</label>
                                    <input class="form-control" type="date" name="staff_doj" required="" placeholder=""/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="staff_address" required="" placeholder="العنوان"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="staff_mobile" required="" placeholder="موبايل"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" name="staff_email" required="" placeholder="الايميل"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="staff_pwd" required="" placeholder="كلمه المرور"/>
                                </div>

                                <input type="submit" name="add_staff" value="اضافه موظف" class='btn'/>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <?php include 'footer.php'; ?>
    </body>
</html>