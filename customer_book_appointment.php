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
            <form action="customer_issue_appointment_process.php" method="POST">
                <div class="form-group">
                    <label>حجز</label> 
                    <input type="datetime-local" class="form-control" name="book">
                </div>
                <div class="form-group">
                    <input type="submit" name="submitBtn" value="حجز" class='btn'>
                </div>
            </form>

            <?php
            include '_inc/dbconn.php';
            $sender_id = $_SESSION["login_id"];

            $sql = "SELECT * FROM book_appointment WHERE account_no='$sender_id'";
            $result = mysqli_query($con, $sql) or die(mysql_error());
            
             $nums = mysqli_num_rows($result);
              if ($nums > 0){
                  for($i=0;$i<$nums;$i++){
          $rws[$i] = mysqli_fetch_assoc($result);
          echo "<table class='table' align='center'>";
                echo "<tr><th>تاريخ الحجز</th><th>رقم الحجز</th><th>الحاله</th></tr>";
                for ($i=0; $i<count($rws);$i++){
                    
                echo "<tr><td>{$rws[$i]['date']}</td><td>{$rws[$i]['id']}</td><td>{$rws[$i]['book_appoint_status']}</td></tr>";
                }
                
                echo "</table>";
          }
              }
            

                
            ?>

        </div>
    </div>

</div>
</div>
</main>

<?php include 'footer.php'; ?>