<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_customer']) && isset($_GET['image1'])) {
        
    $customer_id=$_GET['delete_customer']; 
    $customer=$_GET['image1'];
    
    $delete_customer="DELETE FROM customer WHERE customer_id='$customer_id'";
    $run_customer=mysqli_query($con,$delete_customer);
    $path="../customer/customer_images/".$customer;
  $remove =unlink($path);

  echo "<script>alert('cliente apagado com sucesso')</script>";
  echo "<script>window.open('index.php?view_slide','_self')</script>";
    }
    
}?>