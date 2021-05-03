<?php
session_start();

if (!isset($_SESSION['customer_login']))
    header('location:index.php');
?>

<?php include 'header.php' ?>
<div class='content_customer'>


    <div class="customer_top_nav">
        <div class="text h2 text-center">اهلا <?php echo $_SESSION['name'] ?></div>
    </div>
    <div class="row align-items-center justify-content-between">
        <div class="col-md-4 offset-md-2">
            <?php include 'customer_navbar.php' ?>
        </div>
        <div class="col-md-6">
            <h3 class="text-center" style="color:#2E4372; margin-bottom: 20px">تحويل الاموال</h3>


            <?php
            include '_inc/dbconn.php';
            $sender_id = $_SESSION["login_id"];


            $sql = "SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
            $result = mysqli_query($con, $sql);
            $rws = mysqli_fetch_array($result);
            $s_id = $rws[1];
            ?>


            <?php
            if ($sender_id == $s_id) {
                echo "<form action='customer_transfer_process.php' method='POST'>";
                echo "<div class='form-group'>";
                echo "<label>اختر المستفيد</label> <select class='form-control' name='transfer'>";

                $sql1 = "SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
                $result = mysqli_query($con, $sql);

                while ($rws = mysqli_fetch_array($result)) {
                    echo "<option value='$rws[3]'>$rws[4]</option>";
                }

                echo "</select> </div>";

                echo "<div class='form-group'><label>الكميه</label> <input class='form-control' type='number' name='t_val' required></div>";

                echo "<input type='submit' name='submitBtn' value='تحويل' class='btn'></form>";
            } else {
                echo "<br><br><div class='head'><h3>لا يوجد مستفيد تمت اضافته مع هذا الحساب</h3></div>";
            }
            ?>

        </div>
    </div>

</div>
</div>
</main>
<?php include 'footer.php'; ?>