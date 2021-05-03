<?php
session_start();
include '_inc/dbconn.php';

if (!isset($_SESSION['customer_login']))
    header('location:index.php');
?>

<?php include 'header.php' ?>
<div class='content_customer'>

    <div class="customer_top_nav">
        <div class="text text-center h2">اهلا <?php echo $_SESSION['name'] ?></div>
    </div>
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4 offset-md-2">
            <?php include 'customer_navbar.php' ?>
        </div>
        <div class="col-md-6">

            <h3 style="text-align:center;color:#2E4372; margin-bottom: 20px">تغيير كلمه المرور</h3>
            <form action="" method="POST">
                <div class="form-group">
                    <input class="form-control" type="password" name="old_password" required="" placeholder="كلمه السر القديمه"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="new_password" required="" placeholder="كلمه السر الجديده"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="again_password" required="" placeholder="كلمه السر الجديده"/>
                </div>
                
        
                <input type="submit" name="change_password" value="تغيير" class="btn"/>
            </form>
            <?php
            $change = $_SESSION['login_id'];
            if (isset($_REQUEST['change_password'])) {
                $sql = "SELECT * FROM customer WHERE id='$change'";
                $result = mysqli_query($con, $sql);
                $rws = mysqli_fetch_array($result);

                $salt = "@g26jQsG&nh*&#8v";
                $old = sha1($_REQUEST['old_password'] . $salt);
                $new = sha1($_REQUEST['new_password'] . $salt);
                $again = sha1($_REQUEST['again_password'] . $salt);

                if ($rws[9] == $old && $new == $again) {
                    $sql1 = "UPDATE customer SET password='$new' WHERE id='$change'";
                    mysqli_query($con, $sql1);
                    header('location:customer_account_summary.php');
                } else {

                    header('location:change_account_summary.php');
                }
            }
            ?>
        </div>
    </div>


</div>
</div>
</main>
<?php include 'footer.php'; ?>