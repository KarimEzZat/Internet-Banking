<?php
if (isset($_REQUEST['submitBtn'])) {
    include '_inc/dbconn.php';
    $username = $_REQUEST['uname'];
    $password = $_REQUEST['pwd'];

    $sql = "SELECT name,password FROM customer WHERE name='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $rws = mysqli_num_rows($result);

    if ($rws > 0) {
        session_start();
        $_SESSION['customer_login'] = 1;
        $_SESSION['cust_id'] = $username;
        header('location:customer_account_summary.php');
    } else {
        echo '<script>alert("خطا في كلمه السر او اسم المستخدم ");</script>';
    }
}
?>
<?php
session_start();

if (isset($_SESSION['customer_login']))
    header('location:customer_account_summary.php');
?>

<?php include 'header.php' ?>

<div class="row">
    <div class="col-md-3">
        <div class="user_login">
            <form action='' method='POST'>
                <span class="caption">تسجيل الدخول</span>
                <hr>

                <div class="form-group">
                    <input class="form-control" type="text" name="uname" placeholder="اسم العميل" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="pwd" placeholder="كلمه المرور" required>
                </div>

                <input type="submit" name="submitBtn" value="تسجيل دخول" class="btn">
            </form>
        </div>

        <div class="left_panel">
            <h3>المميزات</h3>
            <ul>
                <li>التسجيل للخدمات المصرفية عبر الإنترنت
                </li>
                <li>إضافة حساب المستفيد
                </li>
                <li>تحويل رصيد</li>
                <li>آخر تسجيل دخول
                </li>
                <li>بيان مصغر</li>
                <li>أجهزة الصراف الآلي وفحص دفتر
                </li>
                <li>ميزة موافقة الموظفين
                </li>
                <li>بيان الحساب حسب التاريخ
                </li>


            </ul>
        </div>   

    </div>

    <div class="col-md-9">

        <div class=" left_choose_image">
            <ul>
                <li><img src="images/mockup-img/m-image-1.png" alt=""></li>
                <li><img src="images/mockup-img/m-image-2.png" alt="" data-parallax='{"x": 25, "y": -50}'></li>
                <li><img src="images/mockup-img/m-image-3.png" alt="" data-parallax='{"x": 50, "y": -100}'></li>
                <li><img src="images/mockup-img/m-image-4.png" alt="" data-parallax='{"x": 90, "y": -180}'></li>
                <li><img src="images/mockup-img/m-image-5.png" alt="" data-parallax='{"x": 20, "y": -30}'></li>
                <li><img src="images/mockup-img/m-image-6.png" alt="" data-parallax='{"x": 90, "y": -100}'></li>
                <li><img src="images/mockup-img/m-image-7.png" alt=""></li>
                <li><img src="images/mockup-img/m-image-8.png" alt="" data-parallax='{"x": 90, "y": -180}'></li>
            </ul>
        </div>
    </div>

</div>

</div>

</main>
<section class="process-section spad">
    <div class="container">
        <div class="section-title text-center">
            <h2>لنبدأ معا</h2>
            <p>تتميز الخدمات البنكيه بالمرونه والسهوله في التعامل وتوفير الوقت والجهد</p>
        </div>
        <div class="row">
            <div class="col-md-4 process">
                <div class="process-step">
                    <figure class="process-icon">
                        <img src="images/process-icons/1.png" alt="#">
                    </figure>
                    <h4>اذهب الي احد فروعنا</h4>
                    <p>توجه الي احد موظفينا واطلب منه ماتريد  واشرح له باستفاضه عن ما تود القيام به داخل البنك</p>
                </div>
            </div>
            <div class="col-md-4 process">
                <div class="process-step">
                    <figure class="process-icon">
                        <img src="images/process-icons/2.png" alt="#">
                    </figure>
                    <h4>استلام وثيقه التاكيد</h4>
                    <p>في هذه الوثيق ستجد بداخلها  اسمك وكلمه المرور وبهما تستطيع الدخول الي موقع البنك </p>
                </div>
            </div>
            <div class="col-md-4 process">
                <div class="process-step">
                    <figure class="process-icon">
                        <img src="images/process-icons/3.png" alt="#">
                    </figure>
                    <h4>الدخول الي موقعنا</h4>
                    <p>بمجرد دخولك الي الموقع فاهلا بك في عالمنا  وستجد معلوماتك الحسابيه موجوده ووفر علي نفسك الوقت والجهد   </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>
