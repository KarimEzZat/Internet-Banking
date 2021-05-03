<?php
session_start();

if (!isset($_SESSION['staff_login']))
    header('location:staff_login.php');
?>
<?php
$staff_id = $_SESSION['staff_id'];
include '_inc/dbconn.php';
$sql = "SELECT * FROM staff WHERE name='$staff_id'";
$result = mysqli_query($con, $sql) or die(mysql_error());
$rws = mysqli_fetch_array($result);

$id = $rws[0];
$name = $rws[1];
$dob = $rws[2];
$department = $rws[4];
$doj = $rws[5];
$mobile = $rws[7];
$email = $rws[8];
$gender = $rws[10];
$last_login = $rws[11];

$_SESSION['login_id'] = $email;
$_SESSION['name1'] = $name;
$_SESSION['id'] = $id;
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
                <div class="customer_top_nav">
                    <div class="text h2 text-center">اهلا <?php echo $_SESSION['name1'] ?></div>
                </div>
                <div class="row align-items-center justify-content-between">

                    <div class="col-md-4">
                        <?php include 'staff_navbar.php' ?>
                    </div>
                    <div class="col-md-4">

                        <div class="content1">
                            <p><b class="heading">الاسم </b><?php echo $name; ?></p>
                            <p><b class="heading">القسم </b><?php echo $department; ?></p>
                            <p><b class="heading">ايميل </b><?php echo $email; ?></p>
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="content2">
                            <p><b class="heading">تاريخ الانضمام </b><?php echo $doj; ?></p>
                            <p><b class="heading">اخر تواجد </b><?php echo $last_login; ?></p>
                        </div>
                    </div>
                </div>
            </div>





        </section>
        <?php include 'footer.php'; ?>
        <?php
        $date1 = date('Y-m-d H:i:s');
        $_SESSION['staff_date'] = $date1;
        ?>

    </body>
</html>

