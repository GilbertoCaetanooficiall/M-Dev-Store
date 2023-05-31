<?php include("includes/db.php");

session_start();
if (!isset( $_SESSION['worker_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    $worker_email= $_SESSION['worker_email'];
    $get_worker="SELECT * FROM worker WHERE worker_email='$worker_email'";
    $run_worker=mysqli_query($con,$get_worker);
    $row=mysqli_fetch_array($run_worker);
    $worker_id=$row['worker_id'];
    $worker_name=$row['worker_name'];
    $worker_job=$row['worker_job'];
   
    $get_products="SELECT * FROM products";
    $run_products=mysqli_query($con,$get_products);
    $count=mysqli_num_rows($run_products);
   
    $get_customer="SELECT * FROM customer";
    $run_customer=mysqli_query($con,$get_customer);
    $count2=mysqli_num_rows($run_customer);
   
    $get_p_cat="SELECT * FROM products_categories";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $count3=mysqli_num_rows($run_p_cat);
   
    $get_pending_orders1="SELECT * FROM pending_orders";
    $run_pending_orders1=mysqli_query($con,$get_pending_orders1);
    $count5=mysqli_num_rows($run_pending_orders1);
     
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <title>Admin</title>
</head>
<body>
    <div id="wrapper">
        
        <?php include('includes/sidebar.php');?>
        
        <div id="page-wrapper">
            <div class="container-fluid">

            <?php if (isset($_GET['dashboard'])) {
                include("dashboard.php");
            }
                 if (isset($_GET['insert_products'])) {
                include("insert-products.php");
            }
                if (isset($_GET['view_products'])) {
                include("view_products.php");
            }
            if (isset($_GET['edit_p'])) {
                include("edit_p.php");
            }
            if (isset($_GET['delete_p']) && isset($_GET['image1']) && isset($_GET['image2']) && isset($_GET['image3'])) {
                include("delete_p.php");
            }
             
                if (isset($_GET['insert_p_cat'])) {
                include("insert_p_cat.php");
            }
                if (isset($_GET['view_p_cat'])) {
                include("view_p_cat.php");
            }
                if (isset($_GET['delete_p_cat'])) {
                include("delete_p_cat.php");
            }
                if (isset($_GET['edit_p_cat'])) {
                include("edit_p_cat.php");
            }
                if (isset($_GET['view_cat'])) {
                include("view_cat.php");
            }
            if (isset($_GET['insert_cat'])) {
                include("insert_cat.php");
            }
                if (isset($_GET['delete_cat'])) {
                include("delete_cat.php");
            }
                if (isset($_GET['edit_cat'])) {
                include("edit_cat.php");
            }
            if (isset($_GET['view_slide'])) {
                include("view_slide.php");
            }
            if (isset($_GET['insert_slide'])) {
                include("insert_slide.php");
            }
                if (isset($_GET['delete_slide'])&& isset($_GET['image'])) {
                include("delete_slide.php");
            }
                if (isset($_GET['edit_slide'])) {
                include("edit_slide.php");
            }
                if (isset($_GET['view_customer'])) {
                include("view_customer.php");
            }
                if (isset($_GET['view_order'])) {
                include("view_order.php");
            }
                if (isset($_GET['view_payments'])) {
                include("view_payments.php");
            }
           
            if (isset($_GET['edit_profile'])) {
                include("edit_profile.php");
            }
            if (isset($_GET['view_user'])) {
                include("view_user.php");
            }

            ?>

            </div>
        </div>
    </div>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>
</html>
<?php }?>