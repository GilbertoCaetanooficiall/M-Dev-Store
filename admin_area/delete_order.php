<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_order'])) {
        
    $delete_order=$_GET['delete_order']; 
   
    $delete_o="DELETE FROM pending_orders WHERE order_id='$delete_order'";
    $run_delete_o=mysqli_query($con,$delete_o);

    $delete_c="DELETE FROM customer_order WHERE order_id='$delete_order'";
    $run_delete_c=mysqli_query($con,$delete_c);
  echo "<script>alert('encomenda apagada com sucesso')</script>";
  echo "<script>window.open('index.php?view_order','_self')</script>";
    }
    
}?>