<?php 
session_start();
        
if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<?php
                $cust_id=$_SESSION['cust_id'];
                include '_inc/dbconn.php';
                $sql="SELECT * FROM customer WHERE name='$cust_id'";
                $result=  mysqli_query($con, $sql);
                $rws=  mysqli_fetch_array($result);
       
                
                $name= $rws[1];
                $account_no= $rws[0];
                $branch=$rws[10];
                $branch_code= $rws[11];
                $last_login= $rws[12];
                $acc_status=$rws[13];
                $address=$rws[6];
                $acc_type=$rws[5];
                
                $gender=$rws[2];
                $mobile=$rws[7];
                $email=$rws[8];
                
                $_SESSION['login_id']=$account_no;
                $_SESSION['name']=$name;
                ?>


        <?php include 'header.php' ?>
        <div class='content_customer'>
            
           
            <div class="customer_top_nav">
             <div class="text text-center h2">اهلا <?php echo $_SESSION['name']?></div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-4">
                    <?php include 'customer_navbar.php'?>
                </div>
                <?php
                
                $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
                $result=  mysqli_query($con, $sql);
                while($rws=  mysqli_fetch_array($result))
                {
                $balance=$rws[7];
                }            
?>
                <div class="col-md-8">
                     <div class="customer_body">
                         <div class=" row">
                             <div class="col-md-6">
                                 <div class="content1">
            <p><span class="heading">رقم الحساب: </span><?php echo $account_no;?></p>
            <p><span class="heading">الفرع: </span><?php echo $branch;?></p>
            <p><span class="heading">كود الفرع: </span><?php echo $branch_code;?></p>
            </div>
            
           
                             </div>
                             <div class="col-md-6">
                                  <div class="content2">
            <p><span class="heading">الرصيد:  </span><?php echo $balance;?></p>
            <p><span class="heading">حاله الحساب: </span><?php echo $acc_status;?></p>
            <p><span class="heading">اخر تواجد: </span><?php echo $last_login;?></p>
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
            
