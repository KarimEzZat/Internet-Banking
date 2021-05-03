<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>

        <?php include 'header.php' ?>
        <div class='content_customer'>
            
           
            <div class="customer_top_nav">
             <div class="text text-center h2">اهلا <?php echo $_SESSION['name']?></div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4 offset-md-2">
                    <?php include 'customer_navbar.php'?>
                </div>
                <div class="col-md-6">
                    <h3 style="text-align:center;color:#2E4372;">البيانات الشخصيه</h3>
            
            <?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE name='$cust_id'";
                $result=  mysqli_query($con, $sql) or die(mysql_error());
                $rws=  mysqli_fetch_array($result);
                
                
                $name= $rws[1];
                $account_no= $rws[0];
                $dob=$rws[3];
                $nominee=$rws[4];
                $branch=$rws[10];
                $branch_code= $rws[11];
                
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                $address=$rws[6];
                
                $last_login= $rws[12];
                
                $acc_status=$rws[13];
                $acc_type=$rws[5];
                
                
                
                                
?>          <div class="customer_body">
    <div class="row">
        <div class="col-md-6">
            <div class="content3">
                <p><lable>الاسم&nbsp; &nbsp; &nbsp; </lable><?php echo $name;?></p>
            <p><lable>النوع  &nbsp;&nbsp;&nbsp;</lable><?php if($gender=='M') echo "Male"; else echo "Female";?></p>
            <p><lable>موبايل  &nbsp;&nbsp;&nbsp;</lable><?php echo $mobile;?></p>
            <p><lable>ايميل &nbsp;&nbsp;&nbsp;</lable><?php echo $email;?></p>
            <p><lable>العنوان &nbsp;&nbsp;&nbsp;</lable><?php echo $address;?></p>
            </div>
        </div>
        <div class="col-md-6">
             <div class="content4">
            <p><span>رقم الحساب &nbsp;&nbsp;&nbsp;</span><?php echo $account_no;?></p>
            <p><span>المرشح &nbsp;&nbsp;&nbsp;</span><?php echo $nominee;?></p>
            <p><span>الفرع &nbsp;&nbsp;&nbsp;</span><?php echo $branch;?></p>
            <p><span>كود الفرع &nbsp;&nbsp;&nbsp;</span><?php echo $branch_code;?></p>
            
            <p><span >نوع الحساب &nbsp;&nbsp;&nbsp;</span><?php echo $acc_type;?></p>
            </div>
            
        </div>
    </div>
           
            </div>
                    
                </div>
            </div>
            
        </div>
</div>
</main>
               <?php include 'footer.php';?>
            
 