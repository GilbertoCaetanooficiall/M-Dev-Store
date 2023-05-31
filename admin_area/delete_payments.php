<?php if (!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}else {
    
    if (isset($_GET['delete_payments'])) {
        
    $delete_payments=$_GET['delete_payments']; 
   
    $delete_pay="DELETE FROM payments WHERE payments_id='$delete_payments'";
    $run_delete_pay=mysqli_query($con,$delete_pay);

  echo "<script>alert('encomenda apagada com sucesso')</script>";
  echo "<script>window.open('index.php?view_payments','_self')</script>";
    }
    
}?>