<?php
session_start();

if (!isset($_SESSION['customer_login']))
    header('location:index.php');
?>

<?php include 'header.php' ?>
<div class='content_customer'>

    <div class="customer_top_nav">
        <div class="text text-center h2">اهلا <?php echo $_SESSION['name'] ?></div>
    </div>
    <div class="row align-items-center justify-content-between">
        <div class="col-md-4 offset-md-2">
            <?php include 'customer_navbar.php' ?>
        </div>
        <div class="col-md-6">
            <form action="customer_issue_atm_process.php" method="POST">
                <div class="form-group">
                    <label>طلب</label> <select class="form-control align-items-center" name="atm">
                        <option value='ATM' selected>بطاقه صرف الي</option>
                        <option value='CHEQUE'>دفتر الشيكات</option>

                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submitBtn" value="طلب" class='btn'>
                </div>
            </form>

            <?php
            include '_inc/dbconn.php';
            $sender_id = $_SESSION["login_id"];

            $sql = "SELECT * FROM cheque_book WHERE account_no='$sender_id'";
            $result = mysqli_query($con, $sql) or die(mysql_error());
            $rws = mysqli_fetch_array($result);
            $c_status = $rws[3];
            $c_id = $rws[2];

            $sql = "SELECT * FROM atm WHERE account_no='$sender_id'";
            $result = mysqli_query($con, $sql) or die(mysql_error());
            $rws = mysqli_fetch_array($result);
            $atm_status = $rws[3];
            $a_id = $rws[2];

            if (($a_id == $sender_id) || ($c_id == $sender_id)) {

                echo "<table class='table' align='center'>";
                echo "<th>طلب</th><th>الحاله</th>";
                echo "<tr><td>حالة بطاقة الصراف الآلي
: </td><td>$atm_status</td></tr>";
                echo "<tr><td>التحقق من حالة الشيك
: </td><td>$c_status</td></tr>";
                echo "</table>";
            }
            ?>

        </div>
    </div>

</div>
</div>
</main>

<?php include 'footer.php'; ?>