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
                <h3 style="text-align:center;color:#2E4372;margin-bottom: 20px">ملخص الحساب حسب التاريخ
</h3>
        <form action="customer_account_statement_date.php" method="POST">
                 
            <div class="form-group">
                <label>تاريخ البدء</label>
                <input class="form-control" type="date" name="date1" required>
            </div>
            <label>تاريخ الانتهاء</label>
                <div class="form-group">
                    <input class="form-control" type="date" name="date2" required>
                </div>

            <input type="submit" name="summary_date" value="اذهب" class="btn"/>
        </form> 
                
            </div>
        </div>

         

    </div>
</div>
</main>
    <?php include 'footer.php' ?>