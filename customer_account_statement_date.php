<?php
session_start();

if (!isset($_SESSION['customer_login']))
    header('location:index.php');
?>

    <?php include 'header.php' ?>
    <div class='content_customer'>

        
        <div class="customer_top_nav">
             <div class="text text-center h2">اهلا <?php echo $_SESSION['name']?></div>
            </div>
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4 offset-md-2">
                <?php include 'customer_navbar.php' ?>
            </div>
            <div class="col-md-6">
                
        <h3 style="text-align:center;color:#2E4372; margin-bottom: 40px">ملخص الحساب حسب التاريخ
</h3>



        <table align="center">

            <th>Id</th>
            <th>تاريخ المعاملة
</th>
            <th>السرد</th>
            <th>الائتمان</th>
            <th>المدين</th>
            <th>الرصيد</th>

            <?php
            if (isset($_REQUEST['summary_date'])) {
                $date1 = $_REQUEST['date1'];
                $date2 = $_REQUEST['date2'];

                include '_inc/dbconn.php';
                $sender_id = $_SESSION["login_id"];
                $sql = "SELECT * FROM passbook" . $sender_id . " WHERE transactiondate BETWEEN '$date1' AND '$date2'";
                $result = mysqli_query($con, $sql);
                while ($rws = mysqli_fetch_array($result)) {

                    echo "<tr>";
                    echo "<td>" . $rws[0] . "</td>";
                    echo "<td>" . $rws[1] . "</td>";
                    echo "<td>" . $rws[8] . "</td>";
                    echo "<td>" . $rws[5] . "</td>";
                    echo "<td>" . $rws[6] . "</td>";
                    echo "<td>" . $rws[7] . "</td>";

                    echo "</tr>";
                }
            }
            ?>
        </table>
            </div>
            
        </div>




    </div>
</div>
</main>
<?php include 'footer.php' ?>