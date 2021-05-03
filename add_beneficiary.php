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
            <form action='add_beneficiary_process.php' method='post'>
                <h3 style="text-align:center;color:#2E4372; margin-bottom: 20px">اضافه مستفيد</h3>

                    <label>اسم المستفيد </label>
                    <div class="form-group">
                        <input class="form-control" type='text' name='name' required>
                    </div>
                  <label>رقم الحساب </label>
                  <div class="form-group">
                      <input class="form-control" type='text' name='account_no' required>
                  </div>
                    <label>اختيار الفرع </label>
                    <div class="form-group">
                        <select name='branch_select' required>

                                <option value='cairo'>القاهره</option>
                                <option value='mansoura'>المنصوره</option>
                                <option value='nabrouh'>نبروه</option>
                            </select>
                    </div>
                   <label>كود ال IFCS </label><br>
                   <div class="form-group">
                       <input class="form-control" type='text' name='ifsc_code' required>
                   </div>
                 <input type='submit' name='submitBtn' value='اضف' class="btn">

            </form>

        </div>
    </div>

</div>
</div>
</main>

<?php include 'footer.php' ?>
           