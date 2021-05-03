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
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4 offset-md-2">
            <?php include 'customer_navbar.php' ?>
        </div>
        <div class="col-md-6">
            <?php
            include '_inc/dbconn.php';
            $sender_id = $_SESSION["login_id"];
            $sql = "SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";
            $result = mysqli_query($con, $sql) or die(mysql_error());
            ?>
            <h3 style="color:#2E4372; margin-bottom: 20px">المستفيد المضاف</h3>
            <form action="delete_beneficiary.php">
                <div class="form-group">
                    <table class="table" align="center">

                    <th>Id</th>
                    <th>الاسم</th>
                    <th>رقم حساب المستفيد </th>
                    <th>الحاله</th>

                    <?php
                    while ($rws = mysqli_fetch_array($result)) {

                        echo "<tr><td><input type='radio' name='customer_id' value=" . $rws[0];
                        echo ' checked';
                        echo " /></td>";
                        echo "<td>" . $rws[4] . "</td>";
                        echo "<td>" . $rws[3] . "</td>";
                        echo "<td>" . $rws[5] . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </table>
                </div>
                <input type="submit" name="submit_id" value="مسح المستفيد" class='btn'/>
            </form>
        </div>
    </div>



</div>
</div>
</main>
<?php include 'footer.php' ?>