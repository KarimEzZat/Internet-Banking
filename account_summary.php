<?php
session_start();

if (!isset($_SESSION['customer_login']))
    header('location:index.php');
die();
?>

    <?php include 'header.php' ?>
    <div class='content_customer'>

        <?php include 'customer_navbar.php' ?>

        <?php
        $cust_id = $_SESSION['cust_id'];
        include '_inc/dbconn.php';
        $sql = "SELECT * FROM customer WHERE email='$cust_id'";
        $result = mysqli_query($con, $sql) ;
        $rws = mysqli_fetch_array($result);


        $name = $rws[1];
        $account_no = $rws[0];
        $branch = $rws[10];
        $branch_code = $rws[11];
        $last_login = $rws[12];
        $acc_status = $rws[13];
        $address = $rws[6];
        $acc_type = $rws[5];

        $gender = $rws[2];
        $mobile = $rws[7];
        $email = $rws[8];

        $_SESSION['login_id'] = $account_no;
        $_SESSION['name'] = $name;

        $sql = "SELECT * FROM passbook" . $_SESSION['login_id'];
        $result = mysqli_query($con, $sql) ;
        $rws = mysqli_fetch_array($result);

        $balance = $rws[6];
        ?>
        <p>الاسم: <?php echo $name; ?></p>
        <p>النوع: <?php if ($gender == 'M')
            echo "Male";
        else
            echo "Female";
        ?></p>
        <p>موبايل: <?php echo $mobile; ?></p>
        <p>ايميل: <?php echo $email; ?></p>
        <br>
        <p>رقم الحساب: <?php echo $account_no; ?></p>
        <p>الفرع: <?php echo $branch; ?></p>
        <p>كود الفرع: <?php echo $branch_code; ?></p>
        <p>اخر تواجد: <?php echo $last_login; ?></p>
        <br>
        <p>حاله الحساب: <?php echo $acc_status; ?></p>
        <p>نوع الحساب: <?php echo $acc_type; ?></p>
        <p>العنوان: <?php echo $address; ?></p>

    </div>
<?php include 'footer.php'; ?>

</body>
</html>